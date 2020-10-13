<?php

    namespace App\Libs;

    class Session
    {
        //funcao que seta uma mensagem
        public static function setMessage($message)
        {
            $_SESSION['message'] = $message;
        }

        //funcao que limpa mensagem
        public static function unsetMessage()
        {
            unset($_SESSION['message']);
        }

        //funcao que retorna a mensagem verificando se ha conteudo na sessao mensagem
        public static function getMessage()
        {
            return ($_SESSION['message']) ? $_SESSION['message'] : "";
        }

        //funcao que seta os dados de um formulario em uma sessao
        public static function setForm($form)
        {
            $_SESSION['form'] = $form;
        }
        
        //funcao que limpa a sessao formulario
        public static function unsetForm()
        {
            unset($_SESSION['form']);
        }

        //funcao que retorna os valores de um formulario atravez de uma chave passada como argumento
        public static function getValueForm($key)
        {
            return(isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
        }

        //funcao que verifica se o formulario existe
        public static function issetForm()
        {
            return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
        }
        
        //funcao que seta sessao de erro
        public static function setErro($erro)
        {
            $_SESSION['erro'] = $erro;
        }

        //funcao que retorna erro da sessao
        public static function getErro()
        {
            return (isset($_SESSION['erro'])) ? $_SESSION['erro'] : "";
        }
        //funcao que limpa a sessao de erros
        public static function unsetErro()
        {
            unset($_SESSION['erro']);
        }
    }
