/**
This function extracts from document.cookie 
the value corresponding to the name "username".

If the given cookie has no 'name' called "username", 
then the function returns the empty string.

@param  {string} cookie : the cookie to extract information from
@return {string} the 'value' corresponding to the 'name' "username"
                 the empty string if "username" is not a 'name'
*/


function get_username() {
  let names = [];
  let values = [];
  let cookie = document.cookie;

  let cookies = cookie.split('; ');
  for (let ck of cookies) {
    names.push(ck.split('=')[0]);
    values.push(ck.split('=')[1]);
  }

  if (names.indexOf("username") === -1) {
    return "";
  } else {
    return values[names.indexOf("username")];
  }
}

