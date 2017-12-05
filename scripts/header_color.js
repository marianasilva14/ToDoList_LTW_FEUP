function getAllUrlParams(url) {

  // get query string from url (optional) or window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {

    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split('#')[0];

    // split our query string into its component parts
    var arr = queryString.split('&');

    for (var i=0; i<arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split('=');

      // in case params look like: list[]=thing1&list[]=thing2
      var paramNum = undefined;
      var paramName = a[0].replace(/\[\d*\]/, function(v) {
        paramNum = v.slice(1,-1);
        return '';
      });

      // set parameter value (use 'true' if empty)
      var paramValue = typeof(a[1])==='undefined' ? true : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      paramValue = paramValue.toLowerCase();

      // if parameter name already exists
      if (obj[paramName]) {
        // convert value to array (if still string)
        if (typeof obj[paramName] === 'string') {
          obj[paramName] = [obj[paramName]];
        }
        // if no array index number specified...
        if (typeof paramNum === 'undefined') {
          // put the value on the end of the array
          obj[paramName].push(paramValue);
        }
        // if array index number specified...
        else {
          // put the value at that index number
          obj[paramName][paramNum] = paramValue;
        }
      }
      // if param name doesn't exist yet, set it
      else {
        obj[paramName] = paramValue;
      }
    }
  }

  return obj;
}
$(function header_color() {

  let element = document.querySelector('#info');
  let element2 = document.querySelector('#buttons_MyCategory');
  let element3 = document.querySelector('body');
  console.log(element3);
  let cat_id= getAllUrlParams().cat_id;

  if(cat_id==1){
    element.style.backgroundColor = "#7cdbac";
    element2.style.backgroundColor = "#7cdbac";
    element3.style.backgroundColor = "#FFFFFF";
  }
  else if(cat_id==2){
    element.style.backgroundColor = "#ef7d61";
    element2.style.backgroundColor = "#ef7d61";
    element3.style.backgroundColor = "#FFFFFF";
  }
  else if(cat_id==3){
    element.style.backgroundColor = "#62c8f7";
    element2.style.backgroundColor = "#62c8f7";
    element3.style.backgroundColor = "#FFFFFF";
  }
  else if(cat_id==4){
    element.style.backgroundColor = "#e36a76";
    element2.style.backgroundColor = "#e36a76";
    element3.style.backgroundColor = "#FFFFFF";
  }
  else if(cat_id==5){
    element.style.backgroundColor = "#f3cd56";
    element2.style.backgroundColor = "#f3cd56";
    element3.style.backgroundColor = "#FFFFFF";
  }
  else if(cat_id==6){
    element.style.backgroundColor = "#4e96b4";
    element2.style.backgroundColor = "#4e96b4";
    element3.style.backgroundColor = "#FFFFFF";
  }
return;
});
