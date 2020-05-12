var myTextarea=document.getElementById('editor');
  var editor = CodeMirror.fromTextArea(myTextarea, {
    lineNumbers: true,
    theme: "dracula",
    indentUnit: 4,
    autoCloseBrackets: true,
    highlightSelectionMatches: true,
    styleActiveLine: true,
  });
  

  function selectLang() {

    var input = document.getElementById("select").value;
    if (input){console.log(input)};
    var lang = input;
    editor.setOption("mode", lang);
    location.hash = "#" + lang;
  }
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) 
  {
    input= choice;
    editor.setOption("mode", choice);
  };
  CodeMirror.on(window, "hashchange", function() {
    var lang = location.hash.slice(1);
    if (lang) { input = lang; selectLang(); }
  });
