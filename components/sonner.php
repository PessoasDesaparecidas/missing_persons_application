<div class="w-auto roundend border border-2 border-green-500 px-5 py-2 bg-green-300 absolute right-0 bottom-10 rounded-l transition-all translate-x-full" id="sonner-success">
  <div class="flex justify-between items-center gap-10">
    <div class="flex gap-1 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
        <path d="M20 6 9 17l-5-5" />
      </svg>
      <h3 class="text-green-600 text-sm" id="sonner-success-title">
        Success
      </h3>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x translate-y-px cursor-pointer" id="sonner-success-button-close">
      <path d="M18 6 6 18" />
      <path d="m6 6 12 12" />
    </svg>
  </div>
</div>

<div class="w-auto roundend border border-2 border-red-500 px-5 py-2 bg-red-300 absolute right-0 bottom-10 rounded-l transition-all translate-x-full" id="sonner-error">
  <div class="flex justify-between items-center gap-10">
    <div class="flex gap-1 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert">
        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
        <path d="M12 8v4" />
        <path d="M12 16h.01" />
      </svg>
      <h3 class="text-red-600 text-sm" id="sonner-error-title">error</h3>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x translate-y-px cursor-pointer" id="sonner-error-button-close">
      <path d="M18 6 6 18" />
      <path d="m6 6 12 12" />
    </svg>
  </div>
</div>

<div class="w-auto roundend border border-2 border-yellow-500 px-5 py-2 bg-yellow-300 absolute right-0 bottom-10 rounded-l transition-all translate-x-full" id="sonner-alert">
  <div class="flex justify-between items-center gap-10">
    <div class="flex gap-1 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert">
        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
        <path d="M12 9v4" />
        <path d="M12 17h.01" />
      </svg>
      <h3 class="text-yellow-600 text-sm" id="sonner-alert-title">alert</h3>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x translate-y-px cursor-pointer" id="sonner-alert-button-close">
      <path d="M18 6 6 18" />
      <path d="m6 6 12 12" />
    </svg>
  </div>
</div>



<script src="https://cdn.tailwindcss.com"></script>

<script type="module">
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
      toastSuccess.element.classList.add("translate-x-0");
    },
    close: () => {
      toastSuccess.element.classList.remove("translate-x-0");
      toastSuccess.element.classList.add("translate-x-full");
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
      toastAlert.element.classList.add("translate-x-0");
    },
    close: () => {
      toastAlert.element.classList.remove("translate-x-0");
      toastAlert.element.classList.add("translate-x-full");
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
      toastError.element.classList.add("translate-x-0");
    },
    close: () => {
      toastError.element.classList.remove("translate-x-0");
      toastError.element.classList.add("translate-x-full");
    },
  };

  export const toast = {
    success: ({
      message,
      timeInSeconds
    }) => {
      toastSuccess.handle({
        message,
        timeInSeconds
      });
      toastError.close();
      toastAlert.close();
    },
    error: ({
      message,
      timeInSeconds
    }) => {
      toastError.handle({
        message,
        timeInSeconds
      });
      toastSuccess.close();
      toastAlert.close();
    },
    alert: ({
      message,
      timeInSeconds
    }) => {
      toastAlert.handle({
        message,
        timeInSeconds
      });
      toastSuccess.close();
      toastError.close();
    },
  };

  const buttonSuccessClose = document.getElementById(
    "sonner-success-button-close"
  );
  const buttonAlertClose = document.getElementById(
    "sonner-alert-button-close"
  );
  const buttonErrorClose = document.getElementById(
    "sonner-error-button-close"
  );

  buttonSuccessClose.addEventListener("click", () => {
    toastSuccess.close();
  });

  buttonAlertClose.addEventListener("click", () => {
    toastAlert.close();
  });

  buttonErrorClose.addEventListener("click", () => {
    toastError.close();
  });


  <?php

  $type_sonner = $_SESSION['sonner-type'];
  $message_sonner = $_SESSION['sonner-message'];
  ?>
  <?php if ($type_sonner == 'error') : ?>
    toast.error({
      message: "<?php echo $message_sonner; ?>",
      timeInSeconds: 3,
    });
  <?php endif; ?>
  <?php if ($type_sonner == 'alert') : ?>
    toast.alert({
      message: "<?php echo $message_sonner; ?>",
      timeInSeconds: 3,
    });
  <?php endif; ?>
  <?php if ($type_sonner == 'success') : ?>
    toast.success({
      message: "<?php echo $message_sonner; ?>",
      timeInSeconds: 3,
    });
  <?php endif; ?>
</script>

<?php
$_SESSION['sonner-type'] = '';
$_SESSION['sonner-message'] = '';
?>