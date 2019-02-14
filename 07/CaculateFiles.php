<?php

/**
 * 统计目录下文件总数
 */
class CaculateFiles
{
    /**
     * [$ext 文件后缀]
     * @var string
     */
    private $ext = '.php';

    /**
     * [$showEveryFile 是否显示每个文件的统计数]
     * @var boolean
     */
    private $showEveryFile = true;

    /**
     * [$fileSkip 文件的跳过规则]
     * @var array
     */
    private $fileSkip = array();

    /**
     * [$lineSkip 统计跳过的行规则]
     */
    private $lineSkip = array("*", "/*", "//", "#", '/**');

    /**
     * [$dirSkip 统计跳过的目录规则]
     * @var array
     */
    private $dirSkip = array(".", "..", '.svn');

    public function __construct($ext = '', $dir = '', $showEveryFile = true, $dirSkip = array(), $lineSkip = array(), $fileSkip = array())
    {
        $this->setExt($ext);
        $this->setDirSkip($dirSkip);
        $this->setFileSkip($fileSkip);
        $this->setLineSkip($lineSkip);
        $this->setShowFlag($showEveryFile);
        $this->run($dir);
    }
    /**
     * [setExt 设置文件后缀]
     * @param [type] $ext [description]
     */
    public function setExt($ext)
    {
        if (trim($ext)) {
            $this->ext = strtolower(trim($ext));
        }
    }
    /**
     * [setShowFlag 设置是否显示每个文件的统计数]
     * @param boolean $flag [description]
     */
    public function setShowFlag($flag = true)
    {
        $this->showEveryFile = $flag;
    }

    /**
     * [setDirSkip 设置过滤目录]
     * @param [type] $dirSkip [description]
     */
    public function setDirSkip($dirSkip)
    {
        if ($dirSkip && is_array($dirSkip)) {
            $this->dirSkip = $dirSkip;
        }
    }
    /**
     * [setFileSkip 文件跳过规则]
     * @param [type] $fileSkip [description]
     */
    public function setFileSkip($fileSkip)
    {
        $this->fileSkip = $fileSkip;
    }
    /**
     * [setLineSkip 设置过滤行]
     * @param [type] $lineSkip [description]
     */
    public function setLineSkip($lineSkip)
    {
        if ($lineSkip && is_array($lineSkip)) {
            $this->lineSkip = $lineSkip;
        }
        // print_r($this->lineSkip);
    }

    public function run($dir = '')
    {
        if ($dir == '') {
            return;
        }
        if (!is_dir($dir)) {
            exit('Path error!');
        }
        $this->dump($dir, $this->readDir($dir));
    }

    private function readDir($dir)
    {
        $num = array('totalLine' => 0, 'lineNum' => 0, 'fileNum' => 0, 'filterNum' => 0);
        if ($dh = opendir($dir)) {
            // print_r('~~'.readdir($dh).'~~');
            while (($file = readdir($dh)) !== false) {
                if ($this->skipDir($file)) {
                    // 过滤目录
                    continue;
                }
                echo $dir . '/' . $file . '<br/>';
                // 判断 $file 是否为目录，若为目录，继续读取
                if (is_dir($dir . '/' . $file)) {
                    $result = $this->readDir($dir . '/' . $file);
                    $num['totalLine'] += $result['totalLine'];
                    $num['lineNum'] += $result['lineNum'];
                    $num['fileNum'] += $result['fileNum'];
                    $num['filterNum'] += $result['filterNum'];
                } else {
                    if ($this->skipFile($file)) {
                        // 过滤文件
                        continue;
                    }

                    list($num1, $num2, $num3) = $this->readfiles($dir . '/' . $file);
                    $num['totalLine'] += $num1;
                    $num['lineNum'] += $num2;
                    $num['filterNum'] += $num3;
                    $num['fileNum']++;

                }
            }
            closedir($dh);
        } else {
            echo 'open dir <' . $dir . '> error!' . "\r\n";
        }
        return $num;
    }

    /**
     * [skipDir 执行跳过的目录规则]
     * @param  [type] $dir [目录名]
     * @return [type]      [description]
     */
    private function skipDir($dir)
    {
        // print_r($this->dirSkip);
        if (in_array($dir, $this->dirSkip)) {
            return true;
        }
        return false;
    }

    /**
     * [skipFile 执行跳过的文件规则]
     * @param  [type] $file [文件名]
     * @return [type]       [description]
     */
    private function skipFile($file)
    {
        // print_r('-/'.$file.'/1-2');
        // print_r($this->ext.'--');

        // echo strtolower(strrchr($file, '.'));

        if (strtolower(strrchr($file, '.')) != $this->ext) {
            // 非指定文件格式，跳过文件
            return true;
        }
        if (!$this->fileSkip) {
            // 过滤条件为空
            return false;
        }
        foreach ($this->fileSkip as $skip) {
            if (strpos($file, $skip) === 0) {
                // 查找字符串在文件中首次出现的位置，若存在跳过文件
                return true;
            }
        }
        return false;
    }

    /**
     * [readfiles 读取文件]
     * @param  [type] $file [文件]
     * @return [type]       [description]
     */
    private function readfiles($file)
    {
        $str = file($file);
        // print_r($str);
        $linenum = 0;
        $filternum = 0;
        foreach ($str as $value) {
            if ($this->skipLine(trim($value))) {
                $filternum++;
                continue;
            }
            $linenum++;
        }

        $totalnum = count(file($file));

        if (!$this->showEveryFile) {
            return array($totalnum, $linenum, $filternum);
        }
        echo $file . "\r\n";
        echo 'TotalLine in the file:' . $totalnum . "\r\n";
        echo 'TotalLine with no comment and empty in the file:' . $linenum . "\r\n";
        return array($totalnum, $linenum, $filternum);

    }

    /**
     * [skipLine 文件内容过滤]
     * @param  [type] $string [description]
     * @return [type]         [description]
     */
    private function skipLine($string)
    {
        if ($string == '') {
            return true;
        }
        foreach ($this->lineSkip as $tag) {
            // echo strpos($string, $tag);
            if (strpos($string, $tag) === 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * [dump 显示统计结果]
     * @param  [type] $dir    [description]
     * @param  [type] $result [description]
     * @return [type]         [description]
     */
    private function dump($dir, $result)
    {

        $totalLine = $result['totalLine'];
        $lineNum = $result['lineNum'];
        $fileNum = $result['fileNum'];
        $filterNum = $result['filterNum'];
        echo "*******************************************************************\r\n<br/>";
        echo $dir . " : \r\n<br/>";
        echo "TotalLine : " . $totalLine . "\r\n<br/>"; // 总行数
        echo "TotalLine filter : " . $filterNum . "\r\n<br/>"; // 过滤行数
        echo "TotalLine with no comment and empty : " . $lineNum . "\r\n<br/>"; 
        echo "TotalFiles : " . $fileNum . "\r\n<br/>"; // 文件数

    }

}
