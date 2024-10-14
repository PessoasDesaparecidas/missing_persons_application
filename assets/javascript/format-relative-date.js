function formatRelativeDate(date) {
  const now = new Date();
  const seconds = Math.floor((now - date) / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);
  const weeks = Math.floor(days / 7);

  let result = "";

  if (seconds < 60) {
    result = "agora";
  } else if (minutes < 60) {
    result = `${minutes} minuto${minutes === 1 ? "" : "s"} atrás`;
  } else if (hours < 24) {
    result = `${hours} hora${hours === 1 ? "" : "s"} atrás`;
  } else if (days < 7) {
    result = `${days} dia${days === 1 ? "" : "s"} atrás`;
  } else {
    result = `${weeks} semana${weeks === 1 ? "" : "s"} atrás`;
  }

  return result;
}
const comments = document.querySelectorAll("#date-comments");
comments.forEach((comment) => {
  const date = new Date(comment.getAttribute("date-value"));
  comment.innerText = formatRelativeDate(date);
});
