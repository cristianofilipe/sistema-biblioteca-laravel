let inactivityTimeout; // Variável para armazenar o identificador do timeout

function startInactivityTimer() {
    // Define o tempo limite de inatividade em milissegundos (20 minutos)
    const inactivityTime = 60*60 * 1000; 
    // Limpa o timeout existente, se houver
    clearTimeout(inactivityTimeout);

    // Configura um novo timeout para o tempo limite de inatividade
    inactivityTimeout = setTimeout(logoutUser, inactivityTime);
}

function logoutUser() {
    // Redireciona o usuário para a página de logout ou executa a lógica de logout
    window.location.href = "http://localhost/sistema-biblioteca/public/logout";
}

// Inicia o temporizador de inatividade quando o usuário interage com a página
document.addEventListener("DOMContentLoaded", () => {
    startInactivityTimer();
});

// Reinicia o temporizador de inatividade sempre que o usuário interagir com a página
document.addEventListener("mousemove", startInactivityTimer);
document.addEventListener("keypress", startInactivityTimer);