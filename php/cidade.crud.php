<?php
    require_once('./conexao.php');
    
    ### manipulação dos dados de cidade na base ###
    
    # persistencia da cidade
    function fnAddCidade($nomeCidade, $siglaUf)
    {
        $query = "insert into cidade(nome_cidade, sigla_uf) values ('{$nomeCidade}', '{$siglaUf}')";
        $link = getConnection();
        
        $result = mysqli_query($link, $query);

        if($result) # if sempre espera uma verdade(true)
        {
            return 'Cadastro com sucesso'; # return encerra a execução no momento de chamada
        }

        mysqli_close($link);
        return 'Erro ao cadastrar'; # default 
    }

    # listagem de cidades
    function fnListaCidade()
    {
        $link = getConnection();
        $query = "select * from cidade";

        $result = mysqli_query($link, $query);

        $cidades = array();
        while($cidade = mysqli_fetch_assoc($result))
        {
            array_push($cidades, $cidade);
        }

        return $cidades;
    }