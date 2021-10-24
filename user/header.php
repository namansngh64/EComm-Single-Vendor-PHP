        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" > </script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
 <style>
     #snackbar{
  min-width: 250px;
  background-color: #c94646;
  color: #fff;
  text-align: center;
  padding: 10px 30px;
  position: fixed;
  top: 30px;
  right: 1%;
  
  
    font-size: 18px;
    font-family: open sans;
  border-radius: 4px;
  visibility: hidden;
     }
     #snackbar.show{
  visibility: visible;
  -webkit-animation: fadein 1s, fadeout 0.5s 2.5s;
  animation: fadein 1s, fadeout 0.5s 2.5s;
     }
     @keyframes fadein{
     from{
    top: 0;
         opacity: 0}
     
     }
     to{
    top: 30px;
        opacity: 1}
     @keyframes fadeout{
     from{
    top: 30px;
         opacity: 1}
     to{
    top: 0;
        opacity: 0}
     }
     @-webkit-keyframes fadein{
     from{
    top: 0;
         opacity: 0}
     to{
    top: 30px;
        opacity: 1}
     }
     @-webkit-keyframes fadeout{
         from{
    top: 30px;
        opacity: 1}
         to{
    top: 0;
        opacity: 0}
     }
     .container{
                margin-bottom: 1%;
            }
     .footer{
                bottom: 0;
                position:fixed;
                background: black;
                width: 100%;
                margin: 0;
                
            }
</style>
<script>
   function mysnackbar(d){
        var x = document.getElementById('snackbar');
        x.className = 'show';
        x.innerHTML=d;
        setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
    }
</script>