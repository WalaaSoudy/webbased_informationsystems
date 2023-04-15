function confirmPass()
{
    let str = document.getElementById("conPass").value;
    let str2 = document.getElementById("pass").value;
    if(str != str2)
    {
        document.getElementById("confirmPass").innerHTML="<br>Passwords don't match";
        return false;
    }
    else
    {
        document.getElementById("confirmPass").innerHTML="<br><br>";
        return true;
    }
}


function checkPassSpecial(str) 
{
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    if (!specialChars.test(str))
    {
        document.getElementById("passSpecial").innerHTML="Your Password must contain a speical character";
        return false;
    }
    else
    {
        document.getElementById("passSpecial").innerHTML="<br>";
        return true;
    }
}

function checkPassNumeral(str)
{
    if(!/\d/.test(str))
    {
        document.getElementById("passNumeral").innerHTML="Your Password must contain a number";
        return false;
    }
    else
    {
        document.getElementById("passNumeral").innerHTML="";
        return true;
    }
}

function checkName(str)
{
    if(/\d/.test(str))
    {
        document.getElementById("nameType").innerHTML="Your Name cannot conatin any numbers";
        return false;
    }
    else
    {
        document.getElementById("nameType").innerHTML="<br>";
        return true;
    }
}
  

function validateForm()
{
    let name = document.getElementById("name").value;
    let pass = document.getElementById("pass").value;

    if(checkName(name) && confirmPass() && checkPassNumeral(pass) && checkPassSpecial(pass))
    {
        return true;
    }
    else
    {
        alert("We found some errors in your inputs");
        return false;
    }
}


function checkNameDatabase(str)
{
    if (str == "") 
    {
        document.getElementById("nameFound").innerHTML = "<br>";
        return;
    } 
    else 
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200) 
          {
            document.getElementById("nameFound").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","DB_Ops.php?q="+str,true);
        xmlhttp.send();
      }
}

function actors()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200) 
          {
            document.getElementById("actors").innerHTML = this.responseText;
          }
        };
        let date = document.getElementById("date").value;
        xmlhttp.open("GET","Api_Ops.php?k="+date,true);
        xmlhttp.send();
}