const image = document.getElementById('missing-image')
const input = document.querySelector('#exampleFormControlInput1')

input.addEventListener("change",()=>{
  image.src= URL.createObjectURL(input.files[0])
})