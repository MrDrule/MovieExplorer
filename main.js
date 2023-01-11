   let signupScreen = document.querySelector('#signupScreen');
   let loginScreen = document.querySelector('#loginScreen');

   let formTitle = document.querySelector('#formTitle');

   let signupForm = document.querySelector('#signupForm');
   let loginForm = document.querySelector('#loginForm');


   signupScreen.addEventListener('click', function(){
       loginForm.style.transform = "translateX(-300px)";
       loginForm.style.width = "0px";

       signupForm.style.transform = "translateX(0px)";
       signupForm.style.width = "100%";
       this.style.display = "none";
       loginScreen.style.display = "block";

       formTitle.innerHTML = "SignUp"
   })


   loginScreen.addEventListener('click', function(){
       signupForm.style.transform = "translateX(300px)";
       signupForm.style.width = "0px";

       loginForm.style.transform = "translateX(0px)";
       loginForm.style.width = "100%";
       this.style.display = "none";
       signupScreen.style.display = "block";

       formTitle.innerHTML = "LogIn"
   })