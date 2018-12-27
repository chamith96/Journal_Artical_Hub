  $(document).ready(function() {
    $('#newsletter_form').bootstrapValidator({
          fields: {
            name: {
                validators: {
                        stringLength: {
                        min: 5,
                    },
                        notEmpty: {
                        message: 'Please enter Full name.'
                    }
                }
            },

            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter email.'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },

             title: {
                validators: {
                     stringLength: {
                        max: 30,
                    },
                    notEmpty: {
                        message: 'Please enter newsletter title.'
                    }
                }
            },

            description: {
               validators: {
                    stringLength: {
                       max: 50,
                   },
                   notEmpty: {
                       message: 'Please enter description.'
                   }
               }
           },

            newsletter_date: {
              validators: {
                notEmpty: {
                    message: 'Please enter newsletter date.'
                }
            }
        },

            image1: {
             validators: {
                notEmpty: {
                    message: 'Please add image'
                },
                    file: {
                      extension: 'png,jpeg,JPG,jpg,PNG',
                      message: 'Please add valid image.'
                   }
            }
        },

            image2: {
                validators: {
                   file: {
                      extension: 'png,jpeg,JPG,jpg,PNG',
                      message: 'Please add valid image.'
                   }
               }
           },

            image3: {
                validators: {
                   file: {
                      extension: 'png,jpeg,JPG,jpg,PNG',
                      message: 'Please add valid image.'
                   }
               }
           },

            image4: {
                validators: {
                   file: {
                      extension: 'png,jpeg,JPG,jpg,PNG',
                      message: 'Please add valid image.'
                   }
               }
           },

            }
        })
});
