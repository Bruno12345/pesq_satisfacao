<?php

/**
 * Description of ReiniciaSequenciaTabela
 *
 * @author brian.monteiro
 */
class DbHelperCommand extends CConsoleCommand {

    /**
     * Reinicia o serial de uma tabela o campo auto-numérico
     */
    public function actionReiniciaSequencia($tabela = null) {
		$aTabelas = array();
		if(!is_null($tabela)){
			$aTabelas[]['tabela'] = $tabela;
		}else{
			$queryTodasTabelas = " select tablename as tabela  from pg_tables where schemaname = 'public'";
			$aRetornoTodasTabelas = Yii::app()->db->createCommand($queryTodasTabelas)->queryAll();
			$aTabelas = $aRetornoTodasTabelas;
		}

		foreach ($aTabelas as $aDados) {
			$select = " (SELECT regexp_replace(regexp_replace(substring(pg_catalog.pg_get_expr(d.adbin, d.adrelid) for 128),'nextval..',''),'.::.*','') FROM pg_catalog.pg_attrdef d WHERE d.adrelid = a.attrelid AND d.adnum = a.attnum AND a.atthasdef) as sequence ";
			$from   = " pg_catalog.pg_attribute a ";
			$where  = " a.attrelid = (SELECT c.oid FROM pg_catalog.pg_class c WHERE c.relname ~ '^(".$aDados['tabela'].")$' ORDER BY 1) ";
			$where .= "AND (SELECT substring(pg_catalog.pg_get_expr(d.adbin, d.adrelid) for 128) FROM pg_catalog.pg_attrdef d WHERE d.adrelid = a.attrelid AND d.adnum = a.attnum AND a.atthasdef) ~ 'nextval'";

			$oSequence = Yii::app()->db->createCommand()
										->select($select)
										->from($from)
										->where($where)
										->queryRow();

			if(empty($oSequence)){
				echo 'Sequencia NAO Reiniciada. Tabela:'.$aDados['tabela']."\n";
				continue;
			}
			try {
				Yii::app()->db->createCommand("select setval('".$oSequence['sequence']."',(select max(id)+1 from ".$aDados['tabela']."))")->queryRow();
				echo 'Sequencia Reiniciada. Tabela:'.$aDados['tabela']."\n";
				continue;
			}catch(Exception $e) {
				echo 'Sequencia NAO Reiniciada. Tabela:'.$aDados['tabela']."\n";
				continue;
			}
		}
    }

}

?>
