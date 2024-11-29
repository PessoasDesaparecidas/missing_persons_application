<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toast Notifications</title>
  <style>
  /* CSS tradicional para os toasts */
  .toast {
    width: auto;
    z-index: 1000;
    position: fixed;
    right: 0;
    bottom: 10px;
    padding: 0.5rem 1.25rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 0.375rem;
    transition: transform 0.3s ease;
    transform: translateX(100%);
  }

  .toast-success {
    background-color: #d1fae5;
    border: 2px solid #16a34a;
  }

  .toast-error {
    background-color: #fecaca;
    border: 2px solid #dc2626;
  }

  .toast-alert {
    background-color: #fef3c7;
    border: 2px solid #ca8a04;
  }

  .toast-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
  }

  .toast-icon-title {
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }

  .toast-title {
    font-size: 0.875rem;
    font-weight: 500;
  }

  .toast-close {
    cursor: pointer;
    transform: translateY(1px);
  }

  .toast-close:hover {
    opacity: 0.75;
  }

  /* Classe para mostrar o toast (deslizar para dentro) */
  .open {
    transform: translateX(0);
  }
  </style>
</head>

<body>
  <div class="toast toast-success" id="sonner-success">
    <div class="toast-content">
      <div class="toast-icon-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
          <path d="M20 6 9 17l-5-5" />
        </svg>
        <h3 class="toast-title" id="sonner-success-title">Success</h3>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x toast-close"
        id="sonner-success-button-close">
        <path d="M18 6 6 18" />
        <path d="m6 6 12 12" />
      </svg>
    </div>
  </div>

  <div class="toast toast-error" id="sonner-error">
    <div class="toast-content">
      <div class="toast-icon-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc2626"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert">
          <path
            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
          <path d="M12 8v4" />
          <path d="M12 16h.01" />
        </svg>
        <h3 class="toast-title" id="sonner-error-title">Error</h3>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc2626"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x toast-close"
        id="sonner-error-button-close">
        <path d="M18 6 6 18" />
        <path d="m6 6 12 12" />
      </svg>
    </div>
  </div>

  <div class="toast toast-alert" id="sonner-alert">
    <div class="toast-content">
      <div class="toast-icon-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ca8a04"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert">
          <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
          <path d="M12 9v4" />
          <path d="M12 17h.01" />
        </svg>
        <h3 class="toast-title" id="sonner-alert-title">Alert</h3>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ca8a04"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x toast-close"
        id="sonner-alert-button-close">
        <path d="M18 6 6 18" />
        <path d="m6 6 12 12" />
      </svg>
    </div>
  </div>

  <script>
  // Funcionalidade JavaScript para exibir e ocultar os toasts
  const toastSuccess = {
    element: document.getElementById("sonner-success"),
    title: document.getElementById("sonner-success-title"),
    handle: ({
      message,
      timeInSeconds
    }) => {
      toastSuccess.open({
        message,
        timeInSeconds
      });
      setTimeout(() => toastSuccess.close(), 1000 * timeInSeconds);
    },
    open: ({
      message,
      timeInSeconds
    }) => {
      toastSuccess.title.innerText = message;
      toastSuccess.element.classList.add("open");
    },
    close: () => {
      toastSuccess.element.classList.remove("open");
    },
  };

  const toastAlert = {
    element: document.getElementById("sonner-alert"),
    title: document.getElementById("sonner-alert-title"),
    handle: ({
      message,
      timeInSeconds
    }) => {
      toastAlert.open({
        message,
        timeInSeconds
      });
      setTimeout(() => toastAlert.close(), 1000 * timeInSeconds);
    },
    open: ({
      message,
      timeInSeconds
    }) => {
      toastAlert.title.innerText = message;
      toastAlert.element.classList.add("open");
    },
    close: () => {
      toastAlert.element.classList.remove("open");
    },
  };

  const toastError = {
    element: document.getElementById("sonner-error"),
    title: document.getElementById("sonner-error-title"),
    handle: ({
      message,
      timeInSeconds
    }) => {
      toastError.open({
        message,
        timeInSeconds
      });
      setTimeout(() => toastError.close(), 1000 * timeInSeconds);
    },
    open: ({
      message,
      timeInSeconds
    }) => {
      toastError.title.innerText = message;
      toastError.element.classList.add("open");
    },
    close: () => {
      toastError.element.classList.remove("open");
    },
  };

  const buttonSuccessClose = document.getElementById("sonner-success-button-close");
  const buttonAlertClose = document.getElementById("sonner-alert-button-close");
  const buttonErrorClose = document.getElementById("sonner-error-button-close");

  buttonSuccessClose.addEventListener("click", () => {
    toastSuccess.close();
  });

  buttonAlertClose.addEventListener("click", () => {
    toastAlert.close();
  });

  buttonErrorClose.addEventListener("click", () => {
    toastError.close();
  });

  // Lógica PHP: Exibe o toast com base na variável de sessão
  <?php if (isset($_SESSION['sonner-type']) && isset($_SESSION['sonner-message'])): ?>
  const message = "<?php echo $_SESSION['sonner-message']; ?>";
  const type = "<?php echo $_SESSION['sonner-type']; ?>";
  const timeInSeconds = 2;
  switch (type) {
    case 'success':
      toastSuccess.handle({
        message,
        timeInSeconds
      });
      break;
    case 'error':
      toastError.handle({
        message,
        timeInSeconds
      });
      break;
    case 'alert':
      toastAlert.handle({
        message,
        timeInSeconds
      });
      break;
  }
  <?php endif; ?>
  </script>
</body>

</html>

<?php
unset($_SESSION['sonner-type']);
unset($_SESSION['sonner-message']);
?>