// cookie for alert banners

jQuery(document).ready(function () {
  //alert(GetCookie("dismissed-notifications"));
    //hide dismissed notifications
    if (GetCookie("dismissed-notifications")) {
        jQuery(GetCookie("dismissed-notifications")).hide();
    }
    jQuery(".close").click(function () {
        var alertId = jQuery(this).closest(".alert").attr("id"); //get the id of the notification to be dismissed
        var dismissedNotifications = GetCookie("dismissed-notifications") + ",#" + alertId; //this is the new value of the dismissed notifications cookie with the array of ids
        jQuery(this).closest(".alert-message").fadeOut('slow'); //dimsiss notification
      SetCookie("dismissed-notifications",dismissedNotifications.replace('null,','')) //update cookie
    });


	// Create a cookie with the specified name and value.
	function SetCookie(sName, sValue)
	{
	  document.cookie = sName + "=" + escape(sValue);
	  // Expires the cookie in one month
	  var date = new Date();
	  date.setMonth(date.getMonth()+1);
	  document.cookie += ("; expires=" + date.toUTCString());
}


	// Retrieve the value of the cookie with the specified name.
	function GetCookie(sName)
	{
	  // cookies are separated by semicolons
	  var aCookie = document.cookie.split("; ");
	  for (var i=0; i < aCookie.length; i++)
	  {
	    // a name/value pair (a crumb) is separated by an equal sign
	    var aCrumb = aCookie[i].split("=");
	    if (sName == aCrumb[0])
	      return unescape(aCrumb[1]);
	  }
	  // a cookie with the requested name does not exist
	  return null;
	}



});


