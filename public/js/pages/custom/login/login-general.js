/******/
(function (modules) { // webpackBootstrap
    /******/ 	// The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ 	// The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ 		// Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ 		// Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/            i: moduleId,
            /******/            l: false,
            /******/            exports: {}
            /******/
        };
        /******/
        /******/ 		// Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ 		// Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ 		// Return the exports of the module
        /******/
        return module.exports;
        /******/
    }

    /******/
    /******/
    /******/ 	// expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ 	// expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ 	// define getter function for harmony exports
    /******/
    __webpack_require__.d = function (exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {enumerable: true, get: getter});
            /******/
        }
        /******/
    };
    /******/
    /******/ 	// define __esModule on exports
    /******/
    __webpack_require__.r = function (exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {value: 'Module'});
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', {value: true});
        /******/
    };
    /******/
    /******/ 	// create a fake namespace object
    /******/ 	// mode & 1: value is a module id, require it
    /******/ 	// mode & 2: merge all properties of value into the ns
    /******/ 	// mode & 4: return value when already ns object
    /******/ 	// mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function (value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', {enumerable: true, value: value});
        /******/
        if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) {
            return value[key];
        }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ 	// getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function (module) {
        /******/
        var getter = module && module.__esModule ?
            /******/            function getDefault() {
                return module['default'];
            } :
            /******/            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ 	// Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ 	// __webpack_public_path__
    /******/
    __webpack_require__.p = "/";
    /******/
    /******/
    /******/ 	// Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 112);
    /******/
})
    /************************************************************************/
    /******/ ({

    /***/ "./resources/metronic/js/pages/custom/login/login-general.js":
    /*!*******************************************************************!*\
      !*** ./resources/metronic/js/pages/custom/login/login-general.js ***!
      \*******************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        "use strict";
        eval("" +
            " // Class Definition\n\nvar KTLogin = function () {\n  var _login;" +
            "\n\n  var _showForm = function _showForm(form) {\n  " +
            "  var cls = 'login-' + form + '-on';\n    " +
            "var form = 'kt_login_' + form + '_form';\n\n   " +
            " _login.removeClass('login-forgot-on');\n\n   " +
            " _login.removeClass('login-signin-on');\n\n    " +
            "_login.removeClass('login-signup-on');\n\n    _login.addClass(cls);\n\n    KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');\n  };\n\n  var _handleSignInForm = function _handleSignInForm() {\n    var validation; // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n\n    validation = FormValidation.formValidation(KTUtil.getById('kt_login_signin_form'), {\n      fields: {\n        username: {\n          validators: {\n            notEmpty: {\n              message: 'Username is required'\n            }\n          }\n        },\n        password: {\n          validators: {\n            notEmpty: {\n              message: 'Password is required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        submitButton: new FormValidation.plugins.SubmitButton(),\n        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation\n        bootstrap: new FormValidation.plugins.Bootstrap()\n      }\n    });\n    $('#kt_login_signin_submit').on('click', function (e) {\n      e.preventDefault();\n      validation.validate().then(function (status) {\n        if (status == 'Valid') {\n          swal.fire({\n            text: \"All is cool! Now you submit this form\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-light-primary\"\n            }\n          }).then(function () {\n            KTUtil.scrollTop();\n          });\n        } else {\n          swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-light-primary\"\n            }\n          }).then(function () {\n            KTUtil.scrollTop();\n          });\n        }\n      });\n    }); // Handle forgot button\n\n    $('#kt_login_forgot').on('click', function (e) {\n      e.preventDefault();\n\n      _showForm('forgot');\n    }); // Handle signup\n\n    $('#kt_login_signup').on('click', function (e) {\n      e.preventDefault();\n\n      _showForm('signup');\n    });\n  };\n\n  var _handleSignUpForm = function _handleSignUpForm(e) {\n    var validation;\n    var form = KTUtil.getById('kt_login_signup_form'); // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n\n    validation = FormValidation.formValidation(form, {\n      fields: {\n        fullname: {\n          validators: {\n            notEmpty: {\n              message: 'Username is required'\n            }\n          }\n        },\n        email: {\n          validators: {\n            notEmpty: {\n              message: 'Email address is required'\n            },\n            emailAddress: {\n              message: 'The value is not a valid email address'\n            }\n          }\n        },\n        password: {\n          validators: {\n            notEmpty: {\n              message: 'The password is required'\n            }\n          }\n        },\n        cpassword: {\n          validators: {\n            notEmpty: {\n              message: 'The password confirmation is required'\n            },\n            identical: {\n              compare: function compare() {\n                return form.querySelector('[name=\"password\"]').value;\n              },\n              message: 'The password and its confirm are not the same'\n            }\n          }\n        },\n        agree: {\n          validators: {\n            notEmpty: {\n              message: 'You must accept the terms and conditions'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap()\n      }\n    });\n    $('#kt_login_signup_submit').on('click', function (e) {\n      e.preventDefault();\n      validation.validate().then(function (status) {\n        if (status == 'Valid') {\n          swal.fire({\n            text: \"All is cool! Now you submit this form\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-light-primary\"\n            }\n          }).then(function () {\n            KTUtil.scrollTop();\n          });\n        } else {\n          swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-light-primary\"\n            }\n          }).then(function () {\n            KTUtil.scrollTop();\n          });\n        }\n      });\n    }); // Handle cancel button\n\n    $('#kt_login_signup_cancel').on('click', function (e) {\n      e.preventDefault();\n\n      _showForm('signin');\n    });\n  };\n\n  var _handleForgotForm = function _handleForgotForm(e) {\n    var validation; // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n\n    validation = FormValidation.formValidation(KTUtil.getById('kt_login_forgot_form'), {\n      fields: {\n        email: {\n          validators: {\n            notEmpty: {\n              message: 'Email address is required'\n            },\n            emailAddress: {\n              message: 'The value is not a valid email address'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap()\n      }\n    }); // Handle submit button\n\n    $('#kt_login_forgot_submit').on('click', function (e) {\n      e.preventDefault();\n      validation.validate().then(function (status) {\n        if (status == 'Valid') {\n          // Submit form\n          KTUtil.scrollTop();\n        } else {\n          swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn font-weight-bold btn-light-primary\"\n            }\n          }).then(function () {\n            KTUtil.scrollTop();\n          });\n        }\n      });\n    }); // Handle cancel button\n\n    $('#kt_login_forgot_cancel').on('click', function (e) {\n      e.preventDefault();\n\n      _showForm('signin');\n    });\n  }; // Public Functions\n\n\n  return {\n    // public functions\n    init: function init() {\n      _login = $('#kt_login');\n\n      _handleSignInForm();\n\n      _handleSignUpForm();\n\n      _handleForgotForm();\n    }\n  };\n}(); // Class Initialization\n\n\njQuery(document).ready(function () {\n  KTLogin.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWV0cm9uaWMvanMvcGFnZXMvY3VzdG9tL2xvZ2luL2xvZ2luLWdlbmVyYWwuanM/MDU4ZiJdLCJuYW1lcyI6WyJLVExvZ2luIiwiX2xvZ2luIiwiX3Nob3dGb3JtIiwiZm9ybSIsImNscyIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJLVFV0aWwiLCJhbmltYXRlQ2xhc3MiLCJnZXRCeUlkIiwiX2hhbmRsZVNpZ25JbkZvcm0iLCJ2YWxpZGF0aW9uIiwiRm9ybVZhbGlkYXRpb24iLCJmb3JtVmFsaWRhdGlvbiIsImZpZWxkcyIsInVzZXJuYW1lIiwidmFsaWRhdG9ycyIsIm5vdEVtcHR5IiwibWVzc2FnZSIsInBhc3N3b3JkIiwicGx1Z2lucyIsInRyaWdnZXIiLCJUcmlnZ2VyIiwic3VibWl0QnV0dG9uIiwiU3VibWl0QnV0dG9uIiwiYm9vdHN0cmFwIiwiQm9vdHN0cmFwIiwiJCIsIm9uIiwiZSIsInByZXZlbnREZWZhdWx0IiwidmFsaWRhdGUiLCJ0aGVuIiwic3RhdHVzIiwic3dhbCIsImZpcmUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnNTdHlsaW5nIiwiY29uZmlybUJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJzY3JvbGxUb3AiLCJfaGFuZGxlU2lnblVwRm9ybSIsImZ1bGxuYW1lIiwiZW1haWwiLCJlbWFpbEFkZHJlc3MiLCJjcGFzc3dvcmQiLCJpZGVudGljYWwiLCJjb21wYXJlIiwicXVlcnlTZWxlY3RvciIsInZhbHVlIiwiYWdyZWUiLCJfaGFuZGxlRm9yZ290Rm9ybSIsImluaXQiLCJqUXVlcnkiLCJkb2N1bWVudCIsInJlYWR5Il0sIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxPQUFPLEdBQUcsWUFBVztBQUNyQixNQUFJQyxNQUFKOztBQUVBLE1BQUlDLFNBQVMsR0FBRyxTQUFaQSxTQUFZLENBQVNDLElBQVQsRUFBZTtBQUMzQixRQUFJQyxHQUFHLEdB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VDtBQUdHQywwQkFBYyxFQUFFLEtBSG5CO0FBSUdDLDZCQUFpQixFQUFFLGFBSnRCO0FBS1NDLHVCQUFXLEVBQUU7QUFDM0JDLDJCQUFhLEVBQUU7QUFEWTtBQUx0QixXQUFWLEVBUVlULElBUlosQ0FRaUIsWUFBVztBQUMzQnpCLGtCQUFNLENBQUNtQyxTQUFQO0FBQ0EsV0FWRDtBQVdBO0FBQ0UsT0FqQks7QUFrQkgsS0FyQkQsRUEzQmdDLENBa0RoQzs7QUFDQWYsS0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJDLEVBQTdCLENBQWdDLE9BQWhDLEVBQXlDLFVBQVVDLENBQVYsRUFBYTtBQUNsREEsT0FBQyxDQUFDQyxjQUFGOztBQUVBNUIsZUFBUyxDQUFDLFFBQUQsQ0FBVDtBQUNILEtBSkQ7QUFLSCxHQXhERCxDQWxNcUIsQ0E0UHJCOzs7QUFDQSxTQUFPO0FBQ0g7QUFDQW9ELFFBQUksRUFBRSxnQkFBVztBQUNickQsWUFBTSxHQUFHMEIsQ0FBQyxDQUFDLFdBQUQsQ0FBVjs7QUFFQWpCLHVCQUFpQjs7QUFDakJpQyx1QkFBaUI7O0FBQ2pCVSx1QkFBaUI7QUFDcEI7QUFSRSxHQUFQO0FBVUgsQ0F2UWEsRUFBZCxDLENBeVFBOzs7QUFDQUUsTUFBTSxDQUFDQyxRQUFELENBQU4sQ0FBaUJDLEtBQWpCLENBQXVCLFlBQVc7QUFDOUJ6RCxTQUFPLENBQUNzRCxJQUFSO0FBQ0gsQ0FGRCIsImZpbGUiOiIuL3Jlc291cmNlcy9tZXRyb25pYy9qcy9wYWdlcy9jdXN0b20vbG9naW4vbG9naW4tZ2VuZXJhbC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgRGVmaW5pdGlvblxyXG52YXIgS1RMb2dpbiA9IGZ1bmN0aW9uKCkge1xyXG4gICAgdmFyIF9sb2dpbjtcclxuXHJcbiAgICB2YXIgX3Nob3dGb3JtID0gZnVuY3Rpb24oZm9ybSkge1xyXG4gICAgICAgIHZhciBjbHMgPSAnbG9naW4tJyArIGZvcm0gKyAnLW9uJztcclxuICAgICAgICB2YXIgZm9ybSA9ICdrdF9sb2dpbl8nICsgZm9ybSArICdfZm9ybSc7XHJcblxyXG4gICAgICAgIF9sb2dpbi5yZW1vdmVDbGFzcygnbG9naW4tZm9yZ290LW9uJyk7XHJcbiAgICAgICAgX2xvZ2luLnJlbW92ZUNsYXNzKCdsb2dpbi1zaWduaW4tb24nKTtcclxuICAgICAgICBfbG9naW4ucmVtb3ZlQ2xhc3MoJ2xvZ2luLXNpZ251cC1vbicpO1xyXG5cclxuICAgICAgICBfbG9naW4uYWRkQ2xhc3MoY2xzKTtcclxuXHJcbiAgICAgICAgS1RVdGlsLmFuaW1hdGVDbGFzcyhLVFV0aWwuZ2V0QnlJZChmb3JtKSwgJ2FuaW1hdGVfX2FuaW1hdGVkIGFuaW1hdGVfX2JhY2tJblVwJyk7XHJcbiAgICB9XHJcblxyXG4gICAgdmFyIF9oYW5kbGVTaWduSW5Gb3JtID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdmFyIHZhbGlkYXRpb247XHJcblxyXG4gICAgICAgIC8vIEluaXQgZm9ybSB2YWxpZGF0aW9uIHJ1bGVzLiBGb3IgbW9yZSBpbmZvIGNoZWNrIHRoZSBGb3JtVmFsaWRhdGlvbiBwbHVnaW4ncyBvZmZpY2lhbCBkb2N1bWVudGF0aW9uOmh0dHBzOi8vZm9ybXZhbGlkYXRpb24uaW8vXHJcbiAgICAgICAgdmFsaWRhdGlvbiA9IEZvcm1WYWxpZGF0aW9uLmZvcm1WYWxpZGF0aW9uKFxyXG5cdFx0XHRLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fc2lnbmluX2Zvcm0nKSxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGZpZWxkczoge1xyXG5cdFx0XHRcdFx0dXNlcm5hbWU6IHtcclxuXHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xyXG5cdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnVXNlcm5hbWUgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHR9LFxyXG5cdFx0XHRcdFx0cGFzc3dvcmQ6IHtcclxuXHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xyXG5cdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XHJcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnUGFzc3dvcmQgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHR9XHJcblx0XHRcdFx0fSxcclxuXHRcdFx0XHRwbHVnaW5zOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgdHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG4gICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuU3VibWl0QnV0dG9uKCksXHJcbiAgICAgICAgICAgICAgICAgICAgLy9kZWZhdWx0U3VibWl0OiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5EZWZhdWx0U3VibWl0KCksIC8vIFVuY29tbWVudCB0aGlzIGxpbmUgdG8gZW5hYmxlIG5vcm1hbCBidXR0b24gc3VibWl0IGFmdGVyIGZvcm0gdmFsaWRhdGlvblxyXG5cdFx0XHRcdFx0Ym9vdHN0cmFwOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5Cb290c3RyYXAoKVxyXG5cdFx0XHRcdH1cclxuXHRcdFx0fVxyXG5cdFx0KTtcclxuXHJcbiAgICAgICAgJCgnI2t0X2xvZ2luX3NpZ25pbl9zdWJtaXQnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICB2YWxpZGF0aW9uLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbihzdGF0dXMpIHtcclxuXHRcdCAgICAgICAgaWYgKHN0YXR1cyA9PSAnVmFsaWQnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgc3dhbC5maXJlKHtcclxuXHRcdCAgICAgICAgICAgICAgICB0ZXh0OiBcIkFsbCBpcyBjb29sISBOb3cgeW91IHN1Ym1pdCB0aGlzIGZvcm1cIixcclxuXHRcdCAgICAgICAgICAgICAgICBpY29uOiBcInN1Y2Nlc3NcIixcclxuXHRcdCAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcblx0XHQgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgIFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG4gICAgXHRcdFx0XHRcdH1cclxuXHRcdCAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0XHRcdEtUVXRpbC5zY3JvbGxUb3AoKTtcclxuXHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRzd2FsLmZpcmUoe1xyXG5cdFx0ICAgICAgICAgICAgICAgIHRleHQ6IFwiU29ycnksIGxvb2tzIGxpa2UgdGhlcmUgYXJlIHNvbWUgZXJyb3JzIGRldGVjdGVkLCBwbGVhc2UgdHJ5IGFnYWluLlwiLFxyXG5cdFx0ICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuXHRcdCAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcblx0XHQgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgIFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b246IFwiYnRuIGZvbnQtd2VpZ2h0LWJvbGQgYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG4gICAgXHRcdFx0XHRcdH1cclxuXHRcdCAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0XHRcdEtUVXRpbC5zY3JvbGxUb3AoKTtcclxuXHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdH1cclxuXHRcdCAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gSGFuZGxlIGZvcmdvdCBidXR0b25cclxuICAgICAgICAkKCcja3RfbG9naW5fZm9yZ290Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICBfc2hvd0Zvcm0oJ2ZvcmdvdCcpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBIYW5kbGUgc2lnbnVwXHJcbiAgICAgICAgJCgnI2t0X2xvZ2luX3NpZ251cCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgX3Nob3dGb3JtKCdzaWdudXAnKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgX2hhbmRsZVNpZ25VcEZvcm0gPSBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgdmFyIHZhbGlkYXRpb247XHJcbiAgICAgICAgdmFyIGZvcm0gPSBLVFV0aWwuZ2V0QnlJZCgna3RfbG9naW5fc2lnbnVwX2Zvcm0nKTtcclxuXHJcbiAgICAgICAgLy8gSW5pdCBmb3JtIHZhbGlkYXRpb24gcnVsZXMuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIEZvcm1WYWxpZGF0aW9uIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246aHR0cHM6Ly9mb3JtdmFsaWRhdGlvbi5pby9cclxuICAgICAgICB2YWxpZGF0aW9uID0gRm9ybVZhbGlkYXRpb24uZm9ybVZhbGlkYXRpb24oXHJcblx0XHRcdGZvcm0sXHJcblx0XHRcdHtcclxuXHRcdFx0XHRmaWVsZHM6IHtcclxuXHRcdFx0XHRcdGZ1bGxuYW1lOiB7XHJcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1VzZXJuYW1lIGlzIHJlcXVpcmVkJ1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fSxcclxuXHRcdFx0XHRcdGVtYWlsOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbGlkYXRvcnM6IHtcclxuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ0VtYWlsIGFkZHJlc3MgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVtYWlsQWRkcmVzczoge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1RoZSB2YWx1ZSBpcyBub3QgYSB2YWxpZCBlbWFpbCBhZGRyZXNzJ1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0fSxcclxuICAgICAgICAgICAgICAgICAgICBwYXNzd29yZDoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWxpZGF0b3JzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBub3RFbXB0eToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2U6ICdUaGUgcGFzc3dvcmQgaXMgcmVxdWlyZWQnXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgIGNwYXNzd29yZDoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWxpZGF0b3JzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBub3RFbXB0eToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2U6ICdUaGUgcGFzc3dvcmQgY29uZmlybWF0aW9uIGlzIHJlcXVpcmVkJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlkZW50aWNhbDoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbXBhcmU6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gZm9ybS5xdWVyeVNlbGVjdG9yKCdbbmFtZT1cInBhc3N3b3JkXCJdJykudmFsdWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtZXNzYWdlOiAnVGhlIHBhc3N3b3JkIGFuZCBpdHMgY29uZmlybSBhcmUgbm90IHRoZSBzYW1lJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBhZ3JlZToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWxpZGF0b3JzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBub3RFbXB0eToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2U6ICdZb3UgbXVzdCBhY2NlcHQgdGhlIHRlcm1zIGFuZCBjb25kaXRpb25zJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuXHRcdFx0XHR9LFxyXG5cdFx0XHRcdHBsdWdpbnM6IHtcclxuXHRcdFx0XHRcdHRyaWdnZXI6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLlRyaWdnZXIoKSxcclxuXHRcdFx0XHRcdGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwKClcclxuXHRcdFx0XHR9XHJcblx0XHRcdH1cclxuXHRcdCk7XHJcblxyXG4gICAgICAgICQoJyNrdF9sb2dpbl9zaWdudXBfc3VibWl0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgdmFsaWRhdGlvbi52YWxpZGF0ZSgpLnRoZW4oZnVuY3Rpb24oc3RhdHVzKSB7XHJcblx0XHQgICAgICAgIGlmIChzdGF0dXMgPT0gJ1ZhbGlkJykge1xyXG4gICAgICAgICAgICAgICAgICAgIHN3YWwuZmlyZSh7XHJcblx0XHQgICAgICAgICAgICAgICAgdGV4dDogXCJBbGwgaXMgY29vbCEgTm93IHlvdSBzdWJtaXQgdGhpcyBmb3JtXCIsXHJcblx0XHQgICAgICAgICAgICAgICAgaWNvbjogXCJzdWNjZXNzXCIsXHJcblx0XHQgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0ICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICBcdFx0XHRcdFx0XHRjb25maXJtQnV0dG9uOiBcImJ0biBmb250LXdlaWdodC1ib2xkIGJ0bi1saWdodC1wcmltYXJ5XCJcclxuICAgIFx0XHRcdFx0XHR9XHJcblx0XHQgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0XHR9KTtcclxuXHRcdFx0XHR9IGVsc2Uge1xyXG5cdFx0XHRcdFx0c3dhbC5maXJlKHtcclxuXHRcdCAgICAgICAgICAgICAgICB0ZXh0OiBcIlNvcnJ5LCBsb29rcyBsaWtlIHRoZXJlIGFyZSBzb21lIGVycm9ycyBkZXRlY3RlZCwgcGxlYXNlIHRyeSBhZ2Fpbi5cIixcclxuXHRcdCAgICAgICAgICAgICAgICBpY29uOiBcImVycm9yXCIsXHJcblx0XHQgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG5cdFx0ICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICBcdFx0XHRcdFx0XHRjb25maXJtQnV0dG9uOiBcImJ0biBmb250LXdlaWdodC1ib2xkIGJ0bi1saWdodC1wcmltYXJ5XCJcclxuICAgIFx0XHRcdFx0XHR9XHJcblx0XHQgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRcdFx0XHRLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0XHR9KTtcclxuXHRcdFx0XHR9XHJcblx0XHQgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8vIEhhbmRsZSBjYW5jZWwgYnV0dG9uXHJcbiAgICAgICAgJCgnI2t0X2xvZ2luX3NpZ251cF9jYW5jZWwnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICBfc2hvd0Zvcm0oJ3NpZ25pbicpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBfaGFuZGxlRm9yZ290Rm9ybSA9IGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICB2YXIgdmFsaWRhdGlvbjtcclxuXHJcbiAgICAgICAgLy8gSW5pdCBmb3JtIHZhbGlkYXRpb24gcnVsZXMuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIEZvcm1WYWxpZGF0aW9uIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246aHR0cHM6Ly9mb3JtdmFsaWRhdGlvbi5pby9cclxuICAgICAgICB2YWxpZGF0aW9uID0gRm9ybVZhbGlkYXRpb24uZm9ybVZhbGlkYXRpb24oXHJcblx0XHRcdEtUVXRpbC5nZXRCeUlkKCdrdF9sb2dpbl9mb3Jnb3RfZm9ybScpLFxyXG5cdFx0XHR7XHJcblx0XHRcdFx0ZmllbGRzOiB7XHJcblx0XHRcdFx0XHRlbWFpbDoge1xyXG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XHJcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdFbWFpbCBhZGRyZXNzIGlzIHJlcXVpcmVkJ1xyXG5cdFx0XHRcdFx0XHRcdH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBlbWFpbEFkZHJlc3M6IHtcclxuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdUaGUgdmFsdWUgaXMgbm90IGEgdmFsaWQgZW1haWwgYWRkcmVzcydcclxuXHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH1cclxuXHRcdFx0XHR9LFxyXG5cdFx0XHRcdHBsdWdpbnM6IHtcclxuXHRcdFx0XHRcdHRyaWdnZXI6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLlRyaWdnZXIoKSxcclxuXHRcdFx0XHRcdGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwKClcclxuXHRcdFx0XHR9XHJcblx0XHRcdH1cclxuXHRcdCk7XHJcblxyXG4gICAgICAgIC8vIEhhbmRsZSBzdWJtaXQgYnV0dG9uXHJcbiAgICAgICAgJCgnI2t0X2xvZ2luX2ZvcmdvdF9zdWJtaXQnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICB2YWxpZGF0aW9uLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbihzdGF0dXMpIHtcclxuXHRcdCAgICAgICAgaWYgKHN0YXR1cyA9PSAnVmFsaWQnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gU3VibWl0IGZvcm1cclxuICAgICAgICAgICAgICAgICAgICBLVFV0aWwuc2Nyb2xsVG9wKCk7XHJcblx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdHN3YWwuZmlyZSh7XHJcblx0XHQgICAgICAgICAgICAgICAgdGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXHJcblx0XHQgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxyXG5cdFx0ICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuXHRcdCAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgXHRcdFx0XHRcdFx0Y29uZmlybUJ1dHRvbjogXCJidG4gZm9udC13ZWlnaHQtYm9sZCBidG4tbGlnaHQtcHJpbWFyeVwiXHJcbiAgICBcdFx0XHRcdFx0fVxyXG5cdFx0ICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdFx0S1RVdGlsLnNjcm9sbFRvcCgpO1xyXG5cdFx0XHRcdFx0fSk7XHJcblx0XHRcdFx0fVxyXG5cdFx0ICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBIYW5kbGUgY2FuY2VsIGJ1dHRvblxyXG4gICAgICAgICQoJyNrdF9sb2dpbl9mb3Jnb3RfY2FuY2VsJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgX3Nob3dGb3JtKCdzaWduaW4nKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIHB1YmxpYyBmdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgX2xvZ2luID0gJCgnI2t0X2xvZ2luJyk7XHJcblxyXG4gICAgICAgICAgICBfaGFuZGxlU2lnbkluRm9ybSgpO1xyXG4gICAgICAgICAgICBfaGFuZGxlU2lnblVwRm9ybSgpO1xyXG4gICAgICAgICAgICBfaGFuZGxlRm9yZ290Rm9ybSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIENsYXNzIEluaXRpYWxpemF0aW9uXHJcbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XHJcbiAgICBLVExvZ2luLmluaXQoKTtcclxufSk7XHJcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/custom/login/login-general.js\n");

        /***/
    }),

    /***/ 112:
    /*!*************************************************************************!*\
      !*** multi ./resources/metronic/js/pages/custom/login/login-general.js ***!
      \*************************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        module.exports = __webpack_require__(/*! C:\wamp64\www\keenthemes\themes\metronic\theme\html_laravel\demo1\skeleton\resources\metronic\js\pages\custom\login\login-general.js */"./resources/metronic/js/pages/custom/login/login-general.js");


        /***/
    })

    /******/
});
