  $(document).ready(function() {
    $('#journal_form').bootstrapValidator({
          fields: {
            title: {
                validators: {
                        stringLength: {
                        max: 30,
                    },
                        notEmpty: {
                        message: 'Please Article title'
                    }
                }
            },

            abstract: {
                validators: {
                     stringLength: {
                        max: 200,
                    },
                    notEmpty: {
                        message: 'Please enter abstract'
                    }
                }
            },

            a1fname: {
                validators: {
                     stringLength: {
                        max: 50,
                    },
                    notEmpty: {
                        message: 'Please enter author 1 first'
                    }
                }
            },

            a1lname: {
                validators: {
                     stringLength: {
                        max: 50,
                    },
                    notEmpty: {
                        message: 'Please enter author 1 last name'
                    }
                }
            },

            a1affiliation: {
                validators: {
                     stringLength: {
                        max: 50,
                    },
                    notEmpty: {
                        message: 'Please enter author 1 affiliation '
                    }
                }
            },

            a1email: {
                validators: {
                     stringLength: {
                        max: 150,
                    },
                    notEmpty: {
                        message: 'Please enter author 1 email'
                    }
                }
            },

            keywords: {
               validators: {
                   notEmpty: {
                       message: 'Please enter keywords'
                   }
               }
           },

           a2fname: {
              validators: {
                  stringLength: {
                      max: 100,
                  }
              }
          },

          a2lname: {
             validators: {
                 stringLength: {
                     max: 100,
                 }
             }
         },

         a2affiliation: {
            validators: {
                stringLength: {
                    max: 100,
                }
            }
        },

        a3fname: {
           validators: {
               stringLength: {
                   max: 100,
               }
           }
       },

       a3lname: {
          validators: {
              stringLength: {
                  max: 100,
              }
          }
      },

      a3affiliation: {
         validators: {
             stringLength: {
                 max: 100,
             }
         }
     },

     a4fname: {
        validators: {
            stringLength: {
                max: 100,
            }
        }
    },

    a4lname: {
       validators: {
           stringLength: {
               max: 100,
           }
       }
   },

   a4affiliation: {
      validators: {
          stringLength: {
              max: 100,
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
                   file: {
                      extension: 'doc,docx',
                      message: 'Please add valid image.'
                   }
               }
           },

            image: {
                validators: {
                  notEmpty: {
                      message: 'Please add an image.'
                  },
                   file: {
                      extension: 'png,jpeg,JPG,jpg,PNG',
                      message: 'Please add valid image.'
                   }
               }
           },

            }
        })
    });
