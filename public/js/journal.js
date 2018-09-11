  $(document).ready(function() {
    $('#journal_form').bootstrapValidator({
          fields: {
            title: {
                validators: {
                        stringLength: {
                        max: 30,
                    },
                        notEmpty: {
                        message: 'Please Journal title.'
                    }
                }
            },

            description: {
                validators: {
                     stringLength: {
                        max: 50,
                    },
                    notEmpty: {
                        message: 'Please enter Journal description.'
                    }
                }
            },

            journal_date: {
               validators: {
                   notEmpty: {
                       message: 'Please enter Journal date.'
                   }
               }
           },

            pdf: {
                validators: {
                   notEmpty: {
                       message: 'Please add pdf file.'
                   },
                   file: {
                      extension: 'pdf',
                      message: 'Please add valid file.'
                   }
               }
           },

            doc: {
                validators: {
                   notEmpty: {
                       message: 'Please doc file.'
                   },
                   file: {
                      extension: 'doc,docx',
                      message: 'Please add valid image.'
                   }
               }
           },

            image1: {
                validators: {
                   file: {
                      extension: 'png,jpeg,jpg',
                      message: 'Please add valid image.'
                   }
               }
           },

            image2: {
                validators: {
                   file: {
                      extension: 'png,jpeg,jpg',
                      message: 'Please add valid image.'
                   }
               }
           },

            image3: {
                validators: {
                   file: {
                      extension: 'png,jpeg,jpg',
                      message: 'Please add valid image.'
                   }
               }
           },

            }
        })
    });
