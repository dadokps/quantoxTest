var quantoxApp = {};

quantoxApp.autoSelectSearch = function(){
    window.onload = function() {
        var keyword = document.getElementById('keyword');
        keyword.onclick = function(){
          this.select();  
        };
    };
};

quantoxApp.autoSelectSearch();

