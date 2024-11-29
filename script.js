function showRegisterForm() {
    // Desliza o main container 30% para a esquerda e desaparece
    const mainContainer = document.querySelector('.main-form');
    mainContainer.style.transition = 'transform 0.3s ease, opacity 0.3s ease'; // Reduzido para 0.3s
    mainContainer.style.transform = 'translateX(-30%)';
    mainContainer.style.opacity = '0'; // Fade-out enquanto move

    // Esconde o formulário de Login
    const loginForm = document.querySelector('.form-login');
    loginForm.classList.remove('active');
    loginForm.style.transform = 'translateX(-20%)';

    // Exibe o formulário de Registro
    const registerForm = document.querySelector('.form-register');
    setTimeout(() => {
        registerForm.classList.add('active');
        registerForm.style.transform = 'translateX(0)';
    }, 300); // Atraso de 300ms para permitir a transição do container

    // Após a animação, traz o main container de volta ao centro com fade-in
    setTimeout(() => {
        mainContainer.style.transition = 'transform 0.3s ease, opacity 0.3s ease'; // Reduzido para 0.3s
        mainContainer.style.transform = 'translateX(0)';
        mainContainer.style.opacity = '1'; // Fade-in
    }, 300); // Atraso de 300ms para deixar o efeito sincronizado
}

function showLoginForm() {
    // Desliza o main container 30% para a direita e desaparece
    const mainContainer = document.querySelector('.main-form');
    mainContainer.style.transition = 'transform 0.3s ease, opacity 0.3s ease'; // Reduzido para 0.3s
    mainContainer.style.transform = 'translateX(30%)';
    mainContainer.style.opacity = '0'; // Fade-out enquanto move

    // Esconde o formulário de Registro
    const registerForm = document.querySelector('.form-register');
    registerForm.classList.remove('active');
    registerForm.style.transform = 'translateX(20%)';

    // Exibe o formulário de Login
    const loginForm = document.querySelector('.form-login');
    setTimeout(() => {
        loginForm.classList.add('active');
        loginForm.style.transform = 'translateX(0)';
    }, 300); // Atraso de 300ms para permitir a transição do container

    // Após a animação, traz o main container de volta ao centro com fade-in
    setTimeout(() => {
        mainContainer.style.transition = 'transform 0.3s ease, opacity 0.3s ease'; // Reduzido para 0.3s
        mainContainer.style.transform = 'translateX(0)';
        mainContainer.style.opacity = '1'; // Fade-in
    }, 300); // Atraso de 300ms para deixar o efeito sincronizado
}
