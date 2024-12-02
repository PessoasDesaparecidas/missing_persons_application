 <select name="language" id="language" class="select-language-group">
     <option value="pt" <?php if ($language == "pt") echo "selected" ?>>pt</option>
     <option value="en" <?php if ($language == "en") echo "selected" ?>>en</option>
     <option value="es" <?php if ($language == "es") echo "selected" ?>>es
     </option>
 </select>

 <script>
     const selecLanguageElement = document.getElementById("language")

     selecLanguageElement.addEventListener("change", () => {
         const selectedLanguage = selecLanguageElement.value;

         const url = new URL(window.location);

         url.searchParams.set("lg", selectedLanguage);

         window.location.href = url.toString();

     })
 </script>