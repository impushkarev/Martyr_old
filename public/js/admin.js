/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(".delete_item,.button_delete").click(DeleteItem);
  var images_list = document.getElementById("images_list");
  new Sortable(images_list, {
    group: 'images',
    animation: 200,
    filter: ".add"
  });
  $("#add_file").click(function () {
    $("#input_file").click();
  });
  $("#add_photo").click(function () {
    $("#input_photo").click();
  });

  (function CheckFiles() {
    $("#input_file").on("change", function () {
      var files = this.files;
      var input = $("<input />", {
        id: "input_file",
        type: "file",
        name: "photo[]",
        multiple: "true",
        accept: "image/*,image/jpeg",
        hidden: "true"
      });

      for (var i = 0; i < files.length; i++) {
        var file = files[i];

        if (!file.type.match(/image\/(jpeg|jpg|png)/)) {
          alert("Фотография " + file.name + " должна быть в jpg или png формате");
          continue;
        }

        CreatePreview(files[i], false);
      }

      $(this).parent().prepend(input);
      CheckFiles();
    });
  })();

  (function CheckFile() {
    $("#input_photo").on("change", function () {
      var file = this.files[0];

      if (!file.type.match(/image\/(jpeg|jpg|png)/)) {
        alert("Фотография " + file.name + " должна быть в jpg или png формате");
        return 0;
      }

      CreatePreview(file, true);
    });
  })();

  function CreatePreview(file, isPreviewOnly) {
    var reader = new FileReader();

    reader.onload = function (event) {
      var delete_button = $("<span />", {
        "class": "delete_item",
        click: DeleteItem,
        text: 'x'
      });
      var img_item = $("<div />", {
        "class": "item",
        html: ["<img src='" + event.target.result + "'/>", delete_button]
      });
      img_item.data('id', file.name);
      if (isPreviewOnly) $("#images_list").html(img_item);else $("#images_list").append(img_item);
    };

    reader.readAsDataURL(file);
  }

  ;

  function DeleteItem() {
    var item = $(this).parent();
    $(item).remove();
  }

  ;
  $(".form-group #list_btn").click(function () {
    var input = $(this).parent().children(".list_s");

    if (input.val()) {
      var option = $('<option />', {
        value: input.val(),
        text: input.val(),
        selected: true
      });
      $(this).closest('.form-group').children('.form-select').prepend(option);
      input.val("");
    } else {
      input.addClass("is-invalid");
    }
  });
  $(".is-invalid").click(function () {
    $(this).removeClass("is-invalid");
  });
  $('.list_s').keypress(function (event) {
    if (event.which === 13) {
      $(this).parent().children("#list_btn").click();
      return false;
    }
  });
  $(".form").on("submit", function () {
    $("#images_list .item").each(function (i, elem) {
      var data_val = $(this).data('id');
      var input_val = $("#photo_names").val();
      $("#photo_names").val(input_val + "|" + data_val);
    });
    $("#photo_names").val($("#photo_names").val().slice(1));
  });
});

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OSPanel\domains\New\resources\js\admin.js */"./resources/js/admin.js");


/***/ })

/******/ });