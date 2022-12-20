<?php
require '/xampp/htdocs/forum8/connect/connection.php';

?>
<html>
    <head>
        <title></title>
    </head>
    
    <script type="text/javascript">
        var obj;
        function createObj(){
            if(window.XMLHttpRequest){
                return new XMLHttpRequest();
            }
            if(window.ActiveXObject){
                return new ActiveXObject("Microsoft.XMLHTTP");
            }
            return null;
        }

        function cariKota(){
            var itemProvince=document.getElementById('cmbProv').value;
            obj = createObj();
            var url="get-item.php";
            url = url+"?type=1";
            url =url+"&itemProvince="+itemProvince;

            obj.onreadystatechange=showCity;
            obj.open("GET",url,true);
            obj.send();
        }

        function showCity(){
            var data;
            if (obj.readyState==4) {
                document.getElementById("cmbCity").innerHTML = obj.responseText;
                return false;
                
            }
        }

        function cantEmpty(){
            let kode = document.getElementById('txtKode').value;
            let nama = document.getElementById('txtNama').value;
            let agama = document.getElementById('cmbAgama').value;
            let prov = document.getElementById('cmbProv').value;
            let kota = document.getElementById('cmbCity').value;
            let pass = document.getElementById('txtPass').value;
            let number = 0;
            var warning=""
            
            if (kode=="") {
                document.getElementById("txtKodeCom").innerHTML = "kode tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else{
                document.getElementById("txtKodeCom").innerHTML = "";   
            }
            if (nama=="") {
                document.getElementById("txtNamaCom").innerHTML = "Nama tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else{
                document.getElementById("txtNamaCom").innerHTML = ""; 
            }
            if (agama=="") {
                document.getElementById("optAgamaCom").innerHTML = "agama tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else {
                document.getElementById("optAgamaCom").innerHTML = "";
            }
            if (prov=="") {
                document.getElementById("optProvCom").innerHTML = "provinsi tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else {
                document.getElementById("optProvCom").innerHTML = "";
            }
            if (kota=="") {
                document.getElementById("optKotaCom").innerHTML = "kota tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else {
                document.getElementById("optKotaCom").innerHTML = "";
            }
            if (pass=="") {
                document.getElementById("passCom").innerHTML = "password tidak boleh kosong";   
                number = number +1;
                warning = warning;
            }else {
                document.getElementById("passCom").innerHTML = "";
            }
            if (document.getElementById("renang").checked == false && 
                document.getElementById("traveling").checked == false &&
                document.getElementById("Catur").checked == false) {
                document.getElementById("hobiCom").innerHTML = "minimal 1 hoby checked";   
                number = number +1;
                warning = warning;
            }else {
                document.getElementById("hobiCom").innerHTML = "";  
            }
            if(warning){
                alert(warning);
                exit();
            }else{
            with(window.document.frmAnggota);
            }
        }

        </script>
    <body>
        <form name="frmAnggota" id="frmAnggota" method="POST" action="formulir_post.php">
            <table>
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="txtKode" id="txtKode" size="20" maxlength="10">
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="txtKodeCom"></div></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="txtNama" id="txtNama" size="20" maxlength="10">
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="txtNamaCom"></div></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="radio" id="optsex" name="optsex" value="laki-laki" checked>laki-laki
                        <input type="radio" id="optsex" name="optsex" value="perempuan">perempuan
                        </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td><select name="cmbAgama" id="cmbAgama">
                    <option value=""></option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                    </select>
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="optAgamaCom"></div></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td><select name="cmbProv" id="cmbProv" onchange="cariKota()">
                        <option value="jakarta">Jakarta</option>
                        <option value="jawa barat">Jawa Barat</option>
                    </select>
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="optProvCom"></div></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td><select name="cmbCity" id="cmbCity">
                    </select>
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="optKotaCom"></div></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="txtAlamat" cols="50px" rows="5px"></textarea>
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="optAlamatCom"></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td><input type="checkbox" name="chk1" id="renang" value="Renang">Renang
                        <input type="checkbox" name="chk2" id="traveling" value="Traveling">Traveling
                        <input type="checkbox" name="chk3" id="Catur" value="Catur">Catur 
                        <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="hobiCom"></div></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="txtPass" name="txtPass" size="20" maxlength="10">
                    <div style="display:inline; margin:0px 0px 0px 5px; color:red;" id="passCom"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="button" onclick="javascript:cantEmpty()" value="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>