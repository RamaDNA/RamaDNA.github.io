<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelog.css">
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

  function carisaya()
  {
    var kode=document.getElementById("txtKode").value;
    var nama=document.getElementById("txtNama").value;
    var sex=document.getElementById("optsex").value;
    var agama=document.getElementById("cmbAgama").value;
    var agamatext=document.getElementById("cmbAgama").options[document.getElementById('cmbAgama').selectedIndex].text;
    var alamat=document.getElementById("txtAlamat").value;
    var passw=document.getElementById("txtPasw").value;
    var warning="";
    var number=0;
    if (kode==""){
      number=number+1;
      warning=number+" kode kosong! \n";
    }
    if (nama==""){
      number=number+1;
      warning=warning+number+" Nama Kosong! \n";
    }
    if (agama==""){
      number=number+1;
      warning=warning+number+" Agama Kosong! \n";
    }
    if (warning) {
      alert(warning);
      exit();
    }
    else {
      with (window.document.frmAnggota) {
        submit();
      }
    }
  }
</script>

<body>
<header>
    <h2>Submit Form</h2>
</header>
<form name="frmAnggota" id="frmAnggota" method="post" action="formulir_post.php">
<table>
    <tr>
      <td><label for="kode"><b>Kode</b></label></td>
      <td><input type="txt" id="txtKode" name="txtKode" size="20" maxlength="10" required>
      <small id="txtKode" class="form-text text-muted" style="color:red">kode tidak boleh kosong!.</small></td>
    </tr>
    <tr>
      <td><label for="name"><b>nama</b></label></td>
      <td><input type="text" id="txtNama" name="txtNama" size="50" maxlength="50" required>
      <small id="txtNama" class="form-text text-muted" style="color:red">Nama tidak boleh kosong!.</small></td>
    </tr>
    <tr>
      <td><label for="psw"><b>Password</b></label></td>
      <td><input type="password" id="txtPass" name="txtPass" size="20" maxlength="10" required>
      <small id="txtPasw" class="form-text text-muted" style="color:red">Password tidak boleh kosong!.</small></td>
    </tr>
    <tr>
      <td><label for="agama"><b>agama</b></label></td>
      <td><select name="cmbAgama" id="cmbAgama">
            <option value=""></option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="budha">Budha</option>
            <option value="katolik">Katolik</option>
            <option value="hindu">Hindu</option>
          </select>
          <small id="cmbAgama" class="form-text text-muted" style="color:red">Agama tidak boleh kosong!.</small>
      </td>
    </tr>
    <tr>
      <td>Provinsi</td>
      <td><select name="cmbProv" id="cmbProv" onchange="cariKota()">
          <option value="jakarta">Jakarta</option>
          <option value="jawa barat">Jawa Barat</option>
                    </select>
      <small id="cmbProv" class="form-text text-muted" style="color:red">Provinsi tidak boleh kosong!.</small>
    </td>
    </tr>
    <tr>
      <td><label for="kota"><b>Kota</b></label></td>
      <td><select name="cmbCity" id="cmbCity"></select>
      <small id="cmbCity" class="form-text text-muted" style="color:red">Kota tidak boleh kosong!.</small></td>
    </tr>
    <tr>
      <td><b>alamat</b></td>
      <td><textarea name="txtAlamat" id="txtAlamat" cols="50px" rows="5px" required></textarea>
      <small id="txtAlamat" class="form-text text-muted" style="color:red">Alamat tidak boleh kosong!.</small></td></td>
    </tr>
    <tr>
      <td><b>Jenis Kelamin </b></td>
      <td><input type="radio" name="optsex" id="optsex" value="laki">
        <label for="gender"><b>Laki laki</b></label>
        <input type="radio" name="optsex" id="optsex" value="perempuan">
        <label for="gender"><b>Perempuan</b></label>
        <small id="optsex" class="form-text text-muted" style="color:red">Jenis kelamin tidak boleh kosong!.</small>
      </td>
    </tr>
    <tr>
      <td><b>Hobi</b></td>
      <td><input type="checkbox" name="check1" value="renang">Renang
          <input type="checkbox" name="check2" value="membaca">membaca
          <input type="checkbox" name="check3" value="bermain bola">bermain bola
          <small id="hobi" class="form-text text-muted" style="color:red">Hobi tidak boleh kosong!.</small>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="button" onclick="javascript:carisaya()" value="simpan"></td>
    </tr>
</table>
</form>
</body>
</html>