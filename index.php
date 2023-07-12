<!DOCTYPE html>
<head>
<link rel="stylesheet" href="./css/crud.css">
</head>
<body>
    <div class="container">
<div class="header">
    <div class="head">CRUD using Ajax</div>
    <div class="inp">
        <label>Search: </label>
        <input required id="search" type="text">
    </div>
</div>

<div class="sec">
    <div class="text">All Records</div>
    <div class="addbtn"><button onclick="add()" >Add New</button></div>
 </div>
    
   

<table>
    <tr>
        <th class="id">ID</th>
        <th>NAME</th>
        <th>CLASS</th>
        <th>CITY</th>
        <th>ACTION</th>
    </tr>
    
    <tbody class="tbody"></tbody>

</table>
</div>

<!-- add  -->
<div class="add">
    <div style="margin-bottom: 18px;">
        <p class="a">Add New Record</p>
        <img onclick="hide()" class="hide_add" src="./images/cross.png" alt="">
    </div>
   
 

   <form action="#" class="form" >
    <div class="d">
        <label class="names">First Name: </label>
        <input name="Fname" id="fname" class="b" type="text">
     </div>

       <div class="d">
        <label class="names">Last Name: </label>
        <input name="Lname" class="b" id="lname" type="text">
    </div>


    <div class="d">
    <label class="names">Class: </label>
        <select class="b" name="options" id="b">
        </select>
    </div>

    <div class="d">
        <label class="names">City: </label>
        <input name="city" id="city" class="b" type="text">
    </div>

    <div class="e">
      <input name="city" type="submit" class="c" id="savebtn" value="Save">
    </div>
</div>
</form>



<!-- edit  -->
<div id="edit" class=""edit>
    <div>
        <p class="a">Edit Form</p>
        <img onclick="hid_edt_box()" src="./images/cross.png" alt="">
    </div>
   <form >
   <div class="d">
        <input required id="hidden" type="hidden">
     </div>

   <div class="d">
        <label class="names">First Name: </label>
        <input required id="F" class="b" type="text">
     </div>

       <div class="d">
        <label class="names">Last Name: </label>
        <input required id="L" class="b" type="text">
    </div>


    <div class="d">
    <label class="names">Class: </label>
        <select class="b" name="" id="O">
        </select>
    </div>

    <div class="d">
        <label class="names">City: </label>
        <input required id="C" class="b" type="text">
    </div>

    <div class="e">
    <input type="button" class="c" onclick="modify()" id="savebtn" value="Save">
    </div>
</form>
</div>

<script src="./js/fetch_JS.js">
    
    </script>
    




</body>
</html>