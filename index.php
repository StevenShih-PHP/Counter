<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訪客計數</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $maxlength = 6;                         //顯示到6位數
        if(!file_exists("counter.txt")){        //如果counter.txt不存在
            $counter = 0;                       //記錄登入人數
            $file = fopen("counter.txt", "w");  //以寫入模式創建counter.txt並打開
            fputs($file, $counter);             //fputs(要寫入的檔案，要寫入的內容)
            fclose($file);                      //關閉文件
        }
        else{
            $file = fopen("counter.txt", "r+"); //以讀寫模式打開counter.txt
            $counter = fread($file, filesize("counter.txt"));   //fread(要讀取的檔案，讀取的字數(filesize:檔案的長度))
            fclose($file);                      //關閉文件
        }

        $counter += 1;                          //每點開一次，登入人數就+1
        $file = fopen("counter.txt", "w+");     //讀寫模式，w+會將內容清空後再寫入
        fputs($file, $counter);
        fclose($file);

        $str = str_repeat("0", $maxlength - strlen($counter));      //str_repeat:將字符串重複執行特定字數(要輸入的字，重複的次數)
        $str .= $counter;                                           //strlen:回傳字符串的長度

        for($i = 0; $i < $maxlength; $i++){                         //substr:回傳一部份字串(字串，起點，要回傳的長度)
            echo "<img src = 'showNum.php?Num=" . substr($str,$i,1) . "'>";
        }
        echo "<ul>";
        for($j = 0; $j < $maxlength; $j++){
            echo "<li>" . substr($str, $j, 1) . "</li>";
        }
        echo "</ul>";
    ?>

</body>
</html>