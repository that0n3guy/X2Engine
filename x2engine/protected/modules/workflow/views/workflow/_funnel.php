<?php
/***********************************************************************************
 * X2CRM is a customer relationship management program developed by
 * X2Engine, Inc. Copyright (C) 2011-2016 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2ENGINE, X2ENGINE DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. P.O. Box 66752, Scotts Valley,
 * California 95067, USA. on our website at www.x2crm.com, or at our
 * email address: contact@x2engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 **********************************************************************************/


if (AuxLib::isIE8 ()) {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl().'/js/jqplot/excanvas.js');
}

Yii::app()->clientScript->registerScriptFile(
    $this->module->assetsUrl.'/js/X2Geometry.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(
    $this->module->assetsUrl.'/js/BaseFunnel.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(
    $this->module->assetsUrl.'/js/Funnel.js', CClientScript::POS_END);

Yii::app()->clientScript->registerScript('_funnelJS',"

x2.funnel = new x2.Funnel ({
    workflowStatus: ".CJSON::encode ($workflowStatus).",
    translations: ".CJSON::encode (array (
        'Total Records' => Yii::t('workflow', 'Total Records'),
        'Total Amount' => Yii::t('workflow', 'Total Amount'),
    )).",
    stageCount: ".$stageCount.",
    recordsPerStage: ".CJSON::encode ($recordsPerStage).",
    stageValues: ".CJSON::encode ($stageValues).",
    totalValue: '".addslashes ($totalValue)."',
    containerSelector: '#funnel-container',
    stageNameLinks: ".CJSON::encode ($stageNameLinks).",
    colors: ".CJSON::encode ($colors).",
});

", CClientScript::POS_END);

?>
<div id='funnel-container'></div>
<?php
