let app = document.getElementById('typewriter');
 
let typewriter = new Typewriter(app, {
  /* se repite infinitamente y que tan rápido lo dice el delay*/
  loop: true,
  delay: 75, /*Que se tarda en poner cada letra */
});
 
typewriter
  .pauseFor(1800)         /*Del inicio*/
  /* texto a mostrar */
  .typeString('Denuncia Segura')
  .pauseFor(1500)
  .deleteChars(2)
  .start();