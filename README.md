voterecord2014
==============

將六都開票過程存入資料庫，事後可繪製時間與票數關係圖。<br>
更新時間為一分鐘。<br>

結果說明
==============
時間欄位為讀取g0v資料後送至伺服器的寫入時間，可能與中選會有數分鐘落差！
###資料表格式
<table>
<tr><td>time</td><td>area</td><td>vote1</td><td>vote2</td><td>vote3</td><td>vote4</td><td>vote5</td><td>vote6</td><td>vote7</td><td>open</td></tr>
<tr><td>時間</td><td>地區</td><td>候選人1</td><td>候選人2</td><td>候選人3</td><td>候選人4</td><td>候選人5</td><td>候選人6</td><td>候選人7</td><td>已送投開票所數</td></tr>
</table>

###檔案代碼
* TC  各區候選人資料
* TC1 臺北市
* TC2 新北市
* TC3 桃園市
* TC4 臺中市
* TC5 臺南市
* TC6 高雄市


###開票結束記錄檔案上傳
2014-11-29  部分檔案因多人同時紀錄，故有一分鐘內出現兩組以上數據的情形，請見諒！

###資料來源
資料擷取自 [2014九合一選舉API](http://vote2014.g0v.ronny.tw)
