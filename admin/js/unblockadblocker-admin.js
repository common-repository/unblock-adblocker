(function ($) {
    "use strict";

    document.addEventListener("DOMContentLoaded", function () {
        if ($("input.unblockadblocker-color-picker").length) {
            $("input.unblockadblocker-color-picker").alphaColorPicker();
        }

        if ($(".toggle").length) {
            $(".toggle").on("change", "input:checkbox", function () {
                $(this).prop("selected", $(this)[0].checked ? 1 : 0);
                $(this).val($(this)[0].checked ? 1 : 0);
            });
        }

        // Type/Delay field controls
        var $type = document.getElementById("unblockadblocker-type");

        if (elementExists($type)) {
            $type.addEventListener("change", toggle_delay);
            toggle_delay();
        }

        // Color picker functionality
        $(".unblockadblocker-color-picker").each(function () {
            var $this = $(this);
            var id = $this.attr("id");
            $("#" + id).wpColorPicker();
        });

        $(".unblockadblocker_country_select_picker").find('select').on("change", function(){
           var site_url = $("#unblockadblocker_sitrurl").val();
            var country = $(this).val();
            console.log(site_url+"/wp-admin/admin.php?page=unblockadblocker-general-settings-page&tab=content_settings&country="+country);
           if(country != ""){
                window.location = site_url+"/wp-admin/admin.php?page=unblockadblocker-general-settings-page&tab=content_settings&country="+country;
           }
           else {
                window.location = site_url+"/wp-admin/admin.php?page=unblockadblocker-general-settings-page&tab=content_settings"; 
           }
          
           
          });


    });
    

    

    

    function toggle_delay() {
        var $type = document.getElementById("unblockadblocker-type");
        var $delay = document.getElementById("unblockadblocker-delay");
        var $scope = document.getElementById("unblockadblocker-scope");
        var $tr = $delay.parentNode.parentNode;
        var $tr_scope = $scope.parentNode.parentNode;

        if ($type.value != "temp") {
            $tr.style.display = "none";
        } else {
            $tr.style.display = "table-row";
        }

        if (["dismissible", "temp"].includes($type.value)) {
            $tr_scope.style.display = "table-row";
        } else {
            $tr_scope.style.display = "none";
        }
    }

    function elementExists(element) {
        if (typeof element != "undefined" && element != null) {
            return true;
        }

        return false;
    }
})(jQuery);