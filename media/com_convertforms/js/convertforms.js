jQuery(function(e){e.fn.convertForms=function(){var t=this,o=e.extend({plugin:"ConvertForms",baseurl:"/",debug:!1},ConvertFormsConfig),n={INIT:"Initialized",SUBMIT:"Submitting form",SUBMIT_SUCCESS:"Successful submission",SUBMIT_ERROR:"Submission failed",REDIRECT:"Redirecting to",NO_ELEMENTS:"No elements found on this page. Aborting.",EMPTY_RESPONSE:"Empty Response",GENERIC_ERROR:"Generic Error"};function r(e,t){e.addClass("cf-error"),e.find(".cf-response").html(t),i("Error: "+t)}function i(e){o.debug&&console.log("["+o.plugin+"] "+e)}return function(){if(!t.length)return void i(n.NO_ELEMENTS);i(n.INIT),t.each(function(){var t=e(this);if(t.hasClass("cf-init"))return!0;var a,s=t.find("form");(a=s).on("submit",function(){return function(t){var a=e(t).parent()[0],s=new CustomEvent("beforeSubmit",{detail:{convertforms:{valid:!0}}});if(a.dispatchEvent(s),s.detail.convertforms.valid){i(n.SUBMIT),box=t.closest(".cf"),button=t.find("button.cf-btn");var c="object"==typeof Joomla?Joomla.getOptions("csrf.token"):ConvertFormsConfig.token;e.ajax({type:"POST",url:o.baseurl+"index.php?option=com_ajax&format=raw&plugin=convertforms&task=submit",data:t.serialize(),headers:{"X-CSRF-Token":c},success:function(o){if(o){try{o=JSON.parse(o)}catch(e){matches=o.match(/{([^}]*)}/i),null!==matches?o=JSON.parse(matches[0]):r(box,e+"<br>"+o)}if(o.success){box.trigger("success",o);var s=new CustomEvent("success",{detail:o});switch(a.dispatchEvent(s),i(n.SUBMIT_SUCCESS),o.task){case"msg":box.addClass("cf-success"),box.find(".cf-response").html(o.value),"1"==o.resetform&&t[0].reset();break;case"url":url=o.value,"1"==o.passdata&&(url+=(o.value.indexOf("?")>-1?"&":"?")+(c={},t.find("input, select, textarea").filter("[name^=cf]").each(function(){name=e(this).attr("name").match(/cf\[(.*)\]/)[1],value=e(this).val(),c[name]=value}),e.param(c))),i(n.REDIRECT+" "+url),window.location.href=url}box.trigger("afterTask",o)}else{box.trigger("error",o);var s=new CustomEvent("error",{detail:o});a.dispatchEvent(s),r(box,o.error),box.find(".cf-fields > .cf-control-group:first .cf-input").focus()}var c}else r(box,n.EMPTY_RESPONSE)},error:function(e,t,o){var i=0==o.length?n.GENERIC_ERROR:o;r(box,i)},beforeSend:function(){box.trigger("beforeSubmit"),box.addClass("cf-working cf-disabled"),box.removeClass("cf-success cf-error")},complete:function(){e(window).trigger("convertFormsAfterSubmit",box),box.trigger("afterSubmit"),box.removeClass("cf-working cf-disabled"),cfHelper.isInViewport(a.querySelector(".cf-response"))||a.scrollIntoView()}})}}(a),!1}),t.addClass("cf-init")});var a=new CustomEvent("convertFormsInit",{detail:e(t).get()});document.dispatchEvent(a)}(),this},e(window).ready(function(){window.ConvertForms={},e(".convertforms").convertForms()})}),document.addEventListener("convertFormsInit",function(e){if("undefined"!=typeof Dropzone){var t=e.detail,o=ConvertFormsConfig.baseurl+"index.php?option=com_ajax&format=raw&plugin=convertforms&task=field&field_type=fileupload",n="object"==typeof Joomla?Joomla.getOptions("csrf.token"):ConvertFormsConfig.token;Dropzone.autoDiscover=!1,Dropzone.prototype.defaultOptions.dictFallbackMessage=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_FALLBACK_MESSAGE"),Dropzone.prototype.defaultOptions.dictFileTooBig=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_FILETOOBIG"),Dropzone.prototype.defaultOptions.dictInvalidFileType=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_INVALID_FILE"),Dropzone.prototype.defaultOptions.dictResponseError=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_RESPONSE_ERROR"),Dropzone.prototype.defaultOptions.dictCancelUpload=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_CANCEL_UPLOAD"),Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_CANCEL_UPLOAD_CONFIRMATION"),Dropzone.prototype.defaultOptions.dictRemoveFile=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_REMOVE_FILE"),Dropzone.prototype.defaultOptions.dictMaxFilesExceeded=Joomla.JText._("COM_CONVERTFORMS_UPLOAD_MAX_FILES_EXCEEDED"),t.forEach(function(e){var t=[];e.querySelectorAll(".cfupload").forEach(function(r){var i=r.closest(".cf-control-input").querySelector(".cfup-tmpl"),a=i.innerHTML;i.closest(".cf-control-input").removeChild(i);var s=parseFloat(r.getAttribute("data-maxfilesize"));s=s||null;var c=parseInt(r.getAttribute("data-maxfiles"));c=c||null;var l=new Dropzone(r,{url:o,previewTemplate:a,maxFilesize:s,uploadMultiple:1!=c,maxFiles:c,acceptedFiles:r.getAttribute("data-acceptedfiles"),autoProcessQueue:!0,parallelUploads:1,filesizeBase:1024,createImageThumbnails:!1,timeout:3e5});l.on("queuecomplete",function(){e.querySelector("button.cf-btn").classList.remove("cf-disabled")}),l.on("processing",function(){e.querySelector("button.cf-btn").classList.add("cf-disabled")}),l.on("sending",function(e,t,o){o.append("form_id",r.closest("form").querySelector("input[name='cf[form_id]']").value),o.append("field_key",r.getAttribute("data-key")),t.setRequestHeader("X-CSRF-Token",n),o.append(n,1)}),l.on("success",function(e){var t=e.xhr.response;try{t=JSON.parse(t)}catch(e){matches=t.match(/{([^}]*)}/i),null!==matches?t=JSON.parse(matches[0]):alert("Error! "+e+"<br>"+t)}var o=document.createElement("input");o.setAttribute("type","hidden"),o.setAttribute("name",r.dataset.name),o.setAttribute("value",t.file),e.previewTemplate.appendChild(o)}),t.push(l)}),e.addEventListener("beforeSubmit",function(e){var o;o=0,t.forEach(function(e){queued_total=e.getQueuedFiles().length,uploading_total=e.getUploadingFiles().length,o=o+queued_total+uploading_total}),o>0&&(e.detail.convertforms.valid=!1)}),jQuery(e).on("success",function(){t.forEach(function(e){e.removeAllFiles()})})})}}),function(e,t){"use strict";var o={isInViewport:function(o){var n=o.getBoundingClientRect();return n.top>=0&&n.left>=0&&n.bottom<=(e.innerHeight||t.documentElement.clientHeight)&&n.right<=(e.innerWidth||t.documentElement.clientWidth)}};e.cfHelper=o}(window,document),document.addEventListener("convertFormsInit",function(e){"undefined"!=typeof Inputmask&&e.detail.forEach(function(e){var t=e.querySelectorAll(".cf-input[data-inputmask-mask]");t&&(Inputmask("",{jitMasking:!1,showMaskOnHover:!1}).mask(t),e.addEventListener("beforeSubmit",function(e){for(var o=!0,n=0;n<t.length;n++){var r=t[n];if(!r.hasAttribute("required"))return;if(!r.inputmask.isComplete()){o=!1,e.detail.convertforms.error={code:"INPUTMASK_INCOMPLETE",target:r},r.focus();break}}e.detail.convertforms.valid=o}))})}),function(){if("function"==typeof window.CustomEvent)return!1;function e(e,t){t=t||{bubbles:!1,cancelable:!1,detail:void 0};var o=document.createEvent("CustomEvent");return o.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),o}e.prototype=window.Event.prototype,window.CustomEvent=e}();
