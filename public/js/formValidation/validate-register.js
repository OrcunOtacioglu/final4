$(document).ready(function () {
    $('#register-form').formValidation({
        framework: "bootstrap4",
        locale: 'en_GB',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name field is required.'
                    },
                    stringLength: {
                        min: 2,
                        max: 100
                    }
                }
            },
            surname: {
                validators: {
                    notEmpty: {
                        message: 'Surname field is required.'
                    },
                    stringLength: {
                        min: 2,
                        max: 100
                    }
                }
            },
            email: {
                validator: {
                    notEmpty: {
                        message: 'Email field is required.'
                    },
                    emailAddress: {
                        message: 'Please provide a valid email address.'
                    },
                    stringLength: {
                        min: 6,
                        max: 100
                    },
                    regexp: {
                        regexp: /([a-zA-Z0-9])\w+/
                    }
                }
            },
            phone: {
                validator: {
                    notEmpty: {
                        message: 'Phone field is required.'
                    },
                    stringLength: {
                        min: 10,
                        max: 25
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Please provide a valid phone number.'
                    }
                }
            },
            citizenship: {
                validator: {
                    notEmpty: {
                        message: 'Citizenship field is required.'
                    },
                    stringLength: {
                        min: 8,
                        max: 25
                    }
                }
            },
            address: {
                validator: {
                    notEmpty: {
                        message: 'Address field is required.'
                    },
                    stringLength: {
                        min: 20,
                        max: 150
                    }
                }
            },
            zip_code: {
                validator: {
                    notEmpty: {
                        message: 'ZIP Code field is required.'
                    },
                    stringLength: {
                        min: 5,
                        max: 20
                    }
                }
            },
            province: {
                validator: {
                    notEmpty: {
                        message: 'Province field is required.'
                    },
                    stringLength: {
                        min: 5,
                        max: 20
                    }
                }
            },
            country: {
                validator: {
                    notEmpty: {
                        message: 'Country field is required.'
                    },
                    stringLength: {
                        min: 3,
                        max: 25
                    }
                }
            },
            identifier: {
                validator: {
                    notEmpty: {
                        message: 'Citizenship | passport number field is required.'
                    },
                    stringLength: {
                        min: 3,
                        max: 25
                    }
                }
            },
            password: {
                validator: {
                    identical: {
                        field: 'password_confirm',
                        message: 'Passwords do not match.'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'Password should be at least 6 characters long.'
                    }
                }
            },
            password_confirm: {
                validator: {
                    identical: {
                        field: 'password',
                        message: 'Passwords do not match.'
                    },
                    stringLength: {
                        min: 6,
                        max: 25
                    }
                }
            }
        }
    });

});

new Formatter(document.getElementById('phone'), {
    'pattern': '({{999}}) {{999}} {{9999}}',
    'persistent': true
});