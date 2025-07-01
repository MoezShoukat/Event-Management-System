document.addEventListener('DOMContentLoaded', function() {
    const signupWrapper = document.getElementById('signup');
    const loginWrapper = document.getElementById('login');
    const registerLink = document.getElementById('RegisterLink');
    const loginLink = document.getElementById('LogInLink');

    
    loginWrapper.style.display = 'block';
    signupWrapper.style.display = 'none';

   
    registerLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        loginWrapper.style.display = 'none'; 
        signupWrapper.style.display = 'block';
    });

    
    loginLink.addEventListener('click', function(event) {
        event.preventDefault();
        signupWrapper.style.display = 'none'; 
        loginWrapper.style.display = 'block'; 
    });
});