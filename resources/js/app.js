const { isUndefined } = require("lodash");

(function() {
    // your page initialization code here
    // the DOM will be available here

    if(typeof($('#alert-div') != 'undefined')){
        setTimeout(()=>{  $('#alert-div').fadeOut(); }, 3000);
    }
 
 })();