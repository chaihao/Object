#!/bin/bash

your_name='runoob'
str="Hello, I know you are \"$your_name\"! \n"
echo -e $str
echo ${#str}

for skill in Ada Coffe Action Java;do
echo "I am good at ${skill}Script"
done

array_name=(value0 value1 value2 value3)

echo ${array_name[0]}
:<<!
name="ceshi_variable"
echo $name

echo "hello World !"
!

# step=5

# for (( i = 0; i < 60; i = (i+$step) )); do
# 	echo $i
# 	sleep $step
# done

echo "Shell 传递参数实例！";
echo "执行的文件名：$0";
echo "第一个参数为：$1";
echo "第二个参数为：$2";
echo "第三个参数为：$3";

val=`expr $1 + $2`
echo "两数之和为 : $val"
echo $$
echo "$*"
echo "$@"
echo "$#"

echo `date`