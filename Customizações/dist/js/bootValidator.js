$(document).ready(function () {
    $('#login').bootstrapValidator({
		container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            login: {
                validators: {
                    notEmpty: { message: 'Por favor informe o login!' }
                }
            },
            senha: {
                validators: {
                    notEmpty: { message: 'Por favor informe a senha!' }
                }
            }
        }
    })
});

$(document).ready(function () {
    $('#cad_user').bootstrapValidator({
		//container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            login: {
                validators: {
                    notEmpty: { message: 'Por favor informe o login!' }
                }
            },
            senha: {
                validators: {
                    notEmpty: { message: 'Por favor informe a senha!' }
                }
            },
			nome: {
                validators: {
                    notEmpty: { message: 'Por favor informe o nome!' }
                }
            },
            categoria: {
                validators: {
                    notEmpty: { message: 'Por favor informe a categoria!' }
                }
            },
            sit: {
                validators: {
                    notEmpty: { message: 'Por favor informe a situação!' }
                }
            }
        }//fields
    })//bootstrapValidator
});
//# sourceURL=pen.js


$(document).ready(function () {
    $('#cad_aluno').bootstrapValidator({
		//container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            matricula: {
                validators: {
                    notEmpty: { message: 'Por favor informe o login!' }
                }
            },
            nome: {
                validators: {
                    notEmpty: { message: 'Por favor informe o nome!' }
                }
            },
			dtnasc: {
                validators: {
                    notEmpty: { message: 'Por favor informe a data de nascimento!' }
                }
            },
			cidade: {
                validators: {
                    notEmpty: { message: 'Por favor informe a cidade!' }
                }
            },
            sexo: {
                validators: {
                    notEmpty: { message: 'Por favor informe o sexo!' }
                }
            },
            uf: {
                validators: {
                    notEmpty: { message: 'Por favor informe a UF!' }
                }
            }
        }//fields
    })//bootstrapValidator
});


$(document).ready(function () {
    $('#cad_curso').bootstrapValidator({
		//container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            numero: {
                validators: {
                    notEmpty: { message: 'Por favor informe o número!' }
                }
            },
            nome: {
                validators: {
                    notEmpty: { message: 'Por favor informe o nome!' }
                }
            },
			sigla: {
                validators: {
                    notEmpty: { message: 'Por favor informe a sigla!' }
                }
            },
        }//fields
    })//bootstrapValidator
});


$(document).ready(function () {
    $('#cad_disciplina').bootstrapValidator({
		//container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            codigo: {
                validators: {
                    notEmpty: { message: 'Por favor informe o código!' }
                }
            },
            nome: {
                validators: {
                    notEmpty: { message: 'Por favor informe o nome!' }
                }
            },
			ch: {
                validators: {
                    notEmpty: { message: 'Por favor informe a carga horária!' }
                }
            },
        }//fields
    })//bootstrapValidator
});
	