<?php
function sonner(string $type, string $message)
{
  $_SESSION["sonner-type"] = $type;
  $_SESSION["sonner-message"] = $message;
}