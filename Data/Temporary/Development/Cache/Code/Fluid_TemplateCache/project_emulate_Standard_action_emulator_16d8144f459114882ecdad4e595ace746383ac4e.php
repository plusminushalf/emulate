<?php
class FluidCache_project_emulate_Standard_action_emulator_16d8144f459114882ecdad4e595ace746383ac4e extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Page';
}
public function hasLayout() {
return TRUE;
}

/**
 * section notifications
 */
public function section_1b60d2ed7158736cbc1353d72a6dc44a6772147f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return '
	<li>
    	<a href="#">
        	<div>
        		<i class="fa fa-envelope fa-fw"></i> Message Sent
        	    <span class="pull-right text-muted small">4 minutes ago</span>
			</div>
		</a>
	</li>
';
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'readyState', $renderingContext), 1);
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments7 = array();
$arguments7['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments7['keepQuotes'] = false;
$arguments7['encoding'] = 'UTF-8';
$arguments7['doubleEncode'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$value9 = ($arguments7['value'] !== NULL ? $arguments7['value'] : $renderChildrenClosure8());

$output6 .= (!is_string($value9) ? $value9 : htmlspecialchars($value9, ($arguments7['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments7['encoding'], $arguments7['doubleEncode']));

$output6 .= '</h3>
                </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Emulator</a></li>
                            <li><a href="#settings" data-toggle="tab">Change Emulator</a></li>
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <br>
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments10 = array();
$arguments10['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array11 = array();
$array11['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments10['arguments'] = $array11;
$arguments10['section'] = NULL;
$arguments10['optional'] = false;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper13->setArguments($arguments10);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output6 .= $viewHelper13->initializeArgumentsAndRender();

$output6 .= '
                            </div>
                            <div class="tab-pane fade in" id="settings">
                                settings
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		';
return $output6;
};
$viewHelper14 = $self->getViewHelper('$viewHelper14', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper14->setArguments($arguments4);
$viewHelper14->setRenderingContext($renderingContext);
$viewHelper14->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output3 .= $viewHelper14->initializeArgumentsAndRender();

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments15 = array();
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
$output17 = '';

$output17 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments18 = array();
$arguments18['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments18['as'] = 'emulator';
$arguments18['key'] = '';
$arguments18['reverse'] = false;
$arguments18['iteration'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
$output20 = '';

$output20 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments21 = array();
$arguments21['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments21['keepQuotes'] = false;
$arguments21['encoding'] = 'UTF-8';
$arguments21['doubleEncode'] = true;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$value23 = ($arguments21['value'] !== NULL ? $arguments21['value'] : $renderChildrenClosure22());

$output20 .= (!is_string($value23) ? $value23 : htmlspecialchars($value23, ($arguments21['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments21['encoding'], $arguments21['doubleEncode']));

$output20 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments24 = array();
$arguments24['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments24['keepQuotes'] = false;
$arguments24['encoding'] = 'UTF-8';
$arguments24['doubleEncode'] = true;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return NULL;
};
$value26 = ($arguments24['value'] !== NULL ? $arguments24['value'] : $renderChildrenClosure25());

$output20 .= (!is_string($value26) ? $value26 : htmlspecialchars($value26, ($arguments24['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments24['encoding'], $arguments24['doubleEncode']));

$output20 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments27 = array();
$arguments27['action'] = 'loadEmulator';
$arguments27['additionalAttributes'] = NULL;
$arguments27['data'] = NULL;
$arguments27['arguments'] = array (
);
$arguments27['controller'] = NULL;
$arguments27['package'] = NULL;
$arguments27['subpackage'] = NULL;
$arguments27['object'] = NULL;
$arguments27['section'] = '';
$arguments27['format'] = '';
$arguments27['additionalParams'] = array (
);
$arguments27['absolute'] = false;
$arguments27['addQueryString'] = false;
$arguments27['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments27['fieldNamePrefix'] = NULL;
$arguments27['actionUri'] = NULL;
$arguments27['objectName'] = NULL;
$arguments27['useParentRequest'] = false;
$arguments27['enctype'] = NULL;
$arguments27['method'] = NULL;
$arguments27['name'] = NULL;
$arguments27['onreset'] = NULL;
$arguments27['onsubmit'] = NULL;
$arguments27['class'] = NULL;
$arguments27['dir'] = NULL;
$arguments27['id'] = NULL;
$arguments27['lang'] = NULL;
$arguments27['style'] = NULL;
$arguments27['title'] = NULL;
$arguments27['accesskey'] = NULL;
$arguments27['tabindex'] = NULL;
$arguments27['onclick'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
$output29 = '';

$output29 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments30 = array();
$arguments30['name'] = 'Emulator';
$arguments30['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments30['additionalAttributes'] = NULL;
$arguments30['data'] = NULL;
$arguments30['property'] = NULL;
$arguments30['class'] = NULL;
$arguments30['dir'] = NULL;
$arguments30['id'] = NULL;
$arguments30['lang'] = NULL;
$arguments30['style'] = NULL;
$arguments30['title'] = NULL;
$arguments30['accesskey'] = NULL;
$arguments30['tabindex'] = NULL;
$arguments30['onclick'] = NULL;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output29 .= $viewHelper32->initializeArgumentsAndRender();

$output29 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments33 = array();
$arguments33['class'] = 'btn btn-link';
$arguments33['value'] = 'Select';
$arguments33['additionalAttributes'] = NULL;
$arguments33['data'] = NULL;
$arguments33['name'] = NULL;
$arguments33['property'] = NULL;
$arguments33['disabled'] = NULL;
$arguments33['dir'] = NULL;
$arguments33['id'] = NULL;
$arguments33['lang'] = NULL;
$arguments33['style'] = NULL;
$arguments33['title'] = NULL;
$arguments33['accesskey'] = NULL;
$arguments33['tabindex'] = NULL;
$arguments33['onclick'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper35->setArguments($arguments33);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure34);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output29 .= $viewHelper35->initializeArgumentsAndRender();

$output29 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments36 = array();
$arguments36['action'] = 'emulator';
$arguments36['class'] = 'text-primary';
$arguments36['additionalAttributes'] = NULL;
$arguments36['data'] = NULL;
$arguments36['arguments'] = array (
);
$arguments36['controller'] = NULL;
$arguments36['package'] = NULL;
$arguments36['subpackage'] = NULL;
$arguments36['section'] = '';
$arguments36['format'] = '';
$arguments36['additionalParams'] = array (
);
$arguments36['addQueryString'] = false;
$arguments36['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments36['useParentRequest'] = false;
$arguments36['absolute'] = true;
$arguments36['dir'] = NULL;
$arguments36['id'] = NULL;
$arguments36['lang'] = NULL;
$arguments36['style'] = NULL;
$arguments36['title'] = NULL;
$arguments36['accesskey'] = NULL;
$arguments36['tabindex'] = NULL;
$arguments36['onclick'] = NULL;
$arguments36['name'] = NULL;
$arguments36['rel'] = NULL;
$arguments36['rev'] = NULL;
$arguments36['target'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper38 = $self->getViewHelper('$viewHelper38', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper38->setArguments($arguments36);
$viewHelper38->setRenderingContext($renderingContext);
$viewHelper38->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output29 .= $viewHelper38->initializeArgumentsAndRender();

$output29 .= '
                				';
return $output29;
};
$viewHelper39 = $self->getViewHelper('$viewHelper39', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper39->setArguments($arguments27);
$viewHelper39->setRenderingContext($renderingContext);
$viewHelper39->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output20 .= $viewHelper39->initializeArgumentsAndRender();

$output20 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output20;
};

$output17 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output17 .= '
    		</div>
		';
return $output17;
};
$viewHelper40 = $self->getViewHelper('$viewHelper40', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper40->setArguments($arguments15);
$viewHelper40->setRenderingContext($renderingContext);
$viewHelper40->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output3 .= $viewHelper40->initializeArgumentsAndRender();

$output3 .= '
	';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$output41 = '';

$output41 .= '
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = 'UTF-8';
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());

$output41 .= (!is_string($value44) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments42['encoding'], $arguments42['doubleEncode']));

$output41 .= '</h3>
                </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Emulator</a></li>
                            <li><a href="#settings" data-toggle="tab">Change Emulator</a></li>
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <br>
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments45 = array();
$arguments45['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array46 = array();
$array46['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments45['arguments'] = $array46;
$arguments45['section'] = NULL;
$arguments45['optional'] = false;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper48->setArguments($arguments45);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure47);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output41 .= $viewHelper48->initializeArgumentsAndRender();

$output41 .= '
                            </div>
                            <div class="tab-pane fade in" id="settings">
                                settings
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		';
return $output41;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$output49 = '';

$output49 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments50 = array();
$arguments50['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments50['as'] = 'emulator';
$arguments50['key'] = '';
$arguments50['reverse'] = false;
$arguments50['iteration'] = NULL;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
$output52 = '';

$output52 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments53 = array();
$arguments53['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments53['keepQuotes'] = false;
$arguments53['encoding'] = 'UTF-8';
$arguments53['doubleEncode'] = true;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
return NULL;
};
$value55 = ($arguments53['value'] !== NULL ? $arguments53['value'] : $renderChildrenClosure54());

$output52 .= (!is_string($value55) ? $value55 : htmlspecialchars($value55, ($arguments53['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments53['encoding'], $arguments53['doubleEncode']));

$output52 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments56 = array();
$arguments56['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments56['keepQuotes'] = false;
$arguments56['encoding'] = 'UTF-8';
$arguments56['doubleEncode'] = true;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};
$value58 = ($arguments56['value'] !== NULL ? $arguments56['value'] : $renderChildrenClosure57());

$output52 .= (!is_string($value58) ? $value58 : htmlspecialchars($value58, ($arguments56['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments56['encoding'], $arguments56['doubleEncode']));

$output52 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments59 = array();
$arguments59['action'] = 'loadEmulator';
$arguments59['additionalAttributes'] = NULL;
$arguments59['data'] = NULL;
$arguments59['arguments'] = array (
);
$arguments59['controller'] = NULL;
$arguments59['package'] = NULL;
$arguments59['subpackage'] = NULL;
$arguments59['object'] = NULL;
$arguments59['section'] = '';
$arguments59['format'] = '';
$arguments59['additionalParams'] = array (
);
$arguments59['absolute'] = false;
$arguments59['addQueryString'] = false;
$arguments59['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments59['fieldNamePrefix'] = NULL;
$arguments59['actionUri'] = NULL;
$arguments59['objectName'] = NULL;
$arguments59['useParentRequest'] = false;
$arguments59['enctype'] = NULL;
$arguments59['method'] = NULL;
$arguments59['name'] = NULL;
$arguments59['onreset'] = NULL;
$arguments59['onsubmit'] = NULL;
$arguments59['class'] = NULL;
$arguments59['dir'] = NULL;
$arguments59['id'] = NULL;
$arguments59['lang'] = NULL;
$arguments59['style'] = NULL;
$arguments59['title'] = NULL;
$arguments59['accesskey'] = NULL;
$arguments59['tabindex'] = NULL;
$arguments59['onclick'] = NULL;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
$output61 = '';

$output61 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments62 = array();
$arguments62['name'] = 'Emulator';
$arguments62['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments62['additionalAttributes'] = NULL;
$arguments62['data'] = NULL;
$arguments62['property'] = NULL;
$arguments62['class'] = NULL;
$arguments62['dir'] = NULL;
$arguments62['id'] = NULL;
$arguments62['lang'] = NULL;
$arguments62['style'] = NULL;
$arguments62['title'] = NULL;
$arguments62['accesskey'] = NULL;
$arguments62['tabindex'] = NULL;
$arguments62['onclick'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper64->setArguments($arguments62);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output61 .= $viewHelper64->initializeArgumentsAndRender();

$output61 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments65 = array();
$arguments65['class'] = 'btn btn-link';
$arguments65['value'] = 'Select';
$arguments65['additionalAttributes'] = NULL;
$arguments65['data'] = NULL;
$arguments65['name'] = NULL;
$arguments65['property'] = NULL;
$arguments65['disabled'] = NULL;
$arguments65['dir'] = NULL;
$arguments65['id'] = NULL;
$arguments65['lang'] = NULL;
$arguments65['style'] = NULL;
$arguments65['title'] = NULL;
$arguments65['accesskey'] = NULL;
$arguments65['tabindex'] = NULL;
$arguments65['onclick'] = NULL;
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper67 = $self->getViewHelper('$viewHelper67', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper67->setArguments($arguments65);
$viewHelper67->setRenderingContext($renderingContext);
$viewHelper67->setRenderChildrenClosure($renderChildrenClosure66);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output61 .= $viewHelper67->initializeArgumentsAndRender();

$output61 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments68 = array();
$arguments68['action'] = 'emulator';
$arguments68['class'] = 'text-primary';
$arguments68['additionalAttributes'] = NULL;
$arguments68['data'] = NULL;
$arguments68['arguments'] = array (
);
$arguments68['controller'] = NULL;
$arguments68['package'] = NULL;
$arguments68['subpackage'] = NULL;
$arguments68['section'] = '';
$arguments68['format'] = '';
$arguments68['additionalParams'] = array (
);
$arguments68['addQueryString'] = false;
$arguments68['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments68['useParentRequest'] = false;
$arguments68['absolute'] = true;
$arguments68['dir'] = NULL;
$arguments68['id'] = NULL;
$arguments68['lang'] = NULL;
$arguments68['style'] = NULL;
$arguments68['title'] = NULL;
$arguments68['accesskey'] = NULL;
$arguments68['tabindex'] = NULL;
$arguments68['onclick'] = NULL;
$arguments68['name'] = NULL;
$arguments68['rel'] = NULL;
$arguments68['rev'] = NULL;
$arguments68['target'] = NULL;
$renderChildrenClosure69 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper70 = $self->getViewHelper('$viewHelper70', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper70->setArguments($arguments68);
$viewHelper70->setRenderingContext($renderingContext);
$viewHelper70->setRenderChildrenClosure($renderChildrenClosure69);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output61 .= $viewHelper70->initializeArgumentsAndRender();

$output61 .= '
                				';
return $output61;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper71->setArguments($arguments59);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure60);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output52 .= $viewHelper71->initializeArgumentsAndRender();

$output52 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output52;
};

$output49 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments50, $renderChildrenClosure51, $renderingContext);

$output49 .= '
    		</div>
		';
return $output49;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper72->setArguments($arguments1);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper72->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output73 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments74 = array();
$arguments74['name'] = 'Page';
$renderChildrenClosure75 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper76 = $self->getViewHelper('$viewHelper76', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper76->setArguments($arguments74);
$viewHelper76->setRenderingContext($renderingContext);
$viewHelper76->setRenderChildrenClosure($renderChildrenClosure75);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output73 .= $viewHelper76->initializeArgumentsAndRender();

$output73 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments77 = array();
$arguments77['name'] = 'notifications';
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
return '
	<li>
    	<a href="#">
        	<div>
        		<i class="fa fa-envelope fa-fw"></i> Message Sent
        	    <span class="pull-right text-muted small">4 minutes ago</span>
			</div>
		</a>
	</li>
';
};

$output73 .= '';

$output73 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments79 = array();
$arguments79['name'] = 'Content';
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments82 = array();
// Rendering Boolean node
$arguments82['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'readyState', $renderingContext), 1);
$arguments82['then'] = NULL;
$arguments82['else'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
$output84 = '';

$output84 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments85 = array();
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
$output87 = '';

$output87 .= '
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments88 = array();
$arguments88['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments88['keepQuotes'] = false;
$arguments88['encoding'] = 'UTF-8';
$arguments88['doubleEncode'] = true;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
return NULL;
};
$value90 = ($arguments88['value'] !== NULL ? $arguments88['value'] : $renderChildrenClosure89());

$output87 .= (!is_string($value90) ? $value90 : htmlspecialchars($value90, ($arguments88['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments88['encoding'], $arguments88['doubleEncode']));

$output87 .= '</h3>
                </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Emulator</a></li>
                            <li><a href="#settings" data-toggle="tab">Change Emulator</a></li>
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <br>
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments91 = array();
$arguments91['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array92 = array();
$array92['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments91['arguments'] = $array92;
$arguments91['section'] = NULL;
$arguments91['optional'] = false;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper94 = $self->getViewHelper('$viewHelper94', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper94->setArguments($arguments91);
$viewHelper94->setRenderingContext($renderingContext);
$viewHelper94->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output87 .= $viewHelper94->initializeArgumentsAndRender();

$output87 .= '
                            </div>
                            <div class="tab-pane fade in" id="settings">
                                settings
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		';
return $output87;
};
$viewHelper95 = $self->getViewHelper('$viewHelper95', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper95->setArguments($arguments85);
$viewHelper95->setRenderingContext($renderingContext);
$viewHelper95->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output84 .= $viewHelper95->initializeArgumentsAndRender();

$output84 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments96 = array();
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
$output98 = '';

$output98 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments99 = array();
$arguments99['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments99['as'] = 'emulator';
$arguments99['key'] = '';
$arguments99['reverse'] = false;
$arguments99['iteration'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
$output101 = '';

$output101 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments102 = array();
$arguments102['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments102['keepQuotes'] = false;
$arguments102['encoding'] = 'UTF-8';
$arguments102['doubleEncode'] = true;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return NULL;
};
$value104 = ($arguments102['value'] !== NULL ? $arguments102['value'] : $renderChildrenClosure103());

$output101 .= (!is_string($value104) ? $value104 : htmlspecialchars($value104, ($arguments102['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments102['encoding'], $arguments102['doubleEncode']));

$output101 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments105 = array();
$arguments105['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments105['keepQuotes'] = false;
$arguments105['encoding'] = 'UTF-8';
$arguments105['doubleEncode'] = true;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$value107 = ($arguments105['value'] !== NULL ? $arguments105['value'] : $renderChildrenClosure106());

$output101 .= (!is_string($value107) ? $value107 : htmlspecialchars($value107, ($arguments105['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments105['encoding'], $arguments105['doubleEncode']));

$output101 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments108 = array();
$arguments108['action'] = 'loadEmulator';
$arguments108['additionalAttributes'] = NULL;
$arguments108['data'] = NULL;
$arguments108['arguments'] = array (
);
$arguments108['controller'] = NULL;
$arguments108['package'] = NULL;
$arguments108['subpackage'] = NULL;
$arguments108['object'] = NULL;
$arguments108['section'] = '';
$arguments108['format'] = '';
$arguments108['additionalParams'] = array (
);
$arguments108['absolute'] = false;
$arguments108['addQueryString'] = false;
$arguments108['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments108['fieldNamePrefix'] = NULL;
$arguments108['actionUri'] = NULL;
$arguments108['objectName'] = NULL;
$arguments108['useParentRequest'] = false;
$arguments108['enctype'] = NULL;
$arguments108['method'] = NULL;
$arguments108['name'] = NULL;
$arguments108['onreset'] = NULL;
$arguments108['onsubmit'] = NULL;
$arguments108['class'] = NULL;
$arguments108['dir'] = NULL;
$arguments108['id'] = NULL;
$arguments108['lang'] = NULL;
$arguments108['style'] = NULL;
$arguments108['title'] = NULL;
$arguments108['accesskey'] = NULL;
$arguments108['tabindex'] = NULL;
$arguments108['onclick'] = NULL;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
$output110 = '';

$output110 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments111 = array();
$arguments111['name'] = 'Emulator';
$arguments111['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments111['additionalAttributes'] = NULL;
$arguments111['data'] = NULL;
$arguments111['property'] = NULL;
$arguments111['class'] = NULL;
$arguments111['dir'] = NULL;
$arguments111['id'] = NULL;
$arguments111['lang'] = NULL;
$arguments111['style'] = NULL;
$arguments111['title'] = NULL;
$arguments111['accesskey'] = NULL;
$arguments111['tabindex'] = NULL;
$arguments111['onclick'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper113->setArguments($arguments111);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output110 .= $viewHelper113->initializeArgumentsAndRender();

$output110 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments114 = array();
$arguments114['class'] = 'btn btn-link';
$arguments114['value'] = 'Select';
$arguments114['additionalAttributes'] = NULL;
$arguments114['data'] = NULL;
$arguments114['name'] = NULL;
$arguments114['property'] = NULL;
$arguments114['disabled'] = NULL;
$arguments114['dir'] = NULL;
$arguments114['id'] = NULL;
$arguments114['lang'] = NULL;
$arguments114['style'] = NULL;
$arguments114['title'] = NULL;
$arguments114['accesskey'] = NULL;
$arguments114['tabindex'] = NULL;
$arguments114['onclick'] = NULL;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output110 .= $viewHelper116->initializeArgumentsAndRender();

$output110 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments117 = array();
$arguments117['action'] = 'emulator';
$arguments117['class'] = 'text-primary';
$arguments117['additionalAttributes'] = NULL;
$arguments117['data'] = NULL;
$arguments117['arguments'] = array (
);
$arguments117['controller'] = NULL;
$arguments117['package'] = NULL;
$arguments117['subpackage'] = NULL;
$arguments117['section'] = '';
$arguments117['format'] = '';
$arguments117['additionalParams'] = array (
);
$arguments117['addQueryString'] = false;
$arguments117['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments117['useParentRequest'] = false;
$arguments117['absolute'] = true;
$arguments117['dir'] = NULL;
$arguments117['id'] = NULL;
$arguments117['lang'] = NULL;
$arguments117['style'] = NULL;
$arguments117['title'] = NULL;
$arguments117['accesskey'] = NULL;
$arguments117['tabindex'] = NULL;
$arguments117['onclick'] = NULL;
$arguments117['name'] = NULL;
$arguments117['rel'] = NULL;
$arguments117['rev'] = NULL;
$arguments117['target'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper119->setArguments($arguments117);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output110 .= $viewHelper119->initializeArgumentsAndRender();

$output110 .= '
                				';
return $output110;
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper120->setArguments($arguments108);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure109);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output101 .= $viewHelper120->initializeArgumentsAndRender();

$output101 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output101;
};

$output98 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments99, $renderChildrenClosure100, $renderingContext);

$output98 .= '
    		</div>
		';
return $output98;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper121->setArguments($arguments96);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output84 .= $viewHelper121->initializeArgumentsAndRender();

$output84 .= '
	';
return $output84;
};
$arguments82['__thenClosure'] = function() use ($renderingContext, $self) {
$output122 = '';

$output122 .= '
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments123 = array();
$arguments123['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments123['keepQuotes'] = false;
$arguments123['encoding'] = 'UTF-8';
$arguments123['doubleEncode'] = true;
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
return NULL;
};
$value125 = ($arguments123['value'] !== NULL ? $arguments123['value'] : $renderChildrenClosure124());

$output122 .= (!is_string($value125) ? $value125 : htmlspecialchars($value125, ($arguments123['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments123['encoding'], $arguments123['doubleEncode']));

$output122 .= '</h3>
                </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Emulator</a></li>
                            <li><a href="#settings" data-toggle="tab">Change Emulator</a></li>
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <br>
                                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments126 = array();
$arguments126['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array127 = array();
$array127['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments126['arguments'] = $array127;
$arguments126['section'] = NULL;
$arguments126['optional'] = false;
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper129 = $self->getViewHelper('$viewHelper129', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper129->setArguments($arguments126);
$viewHelper129->setRenderingContext($renderingContext);
$viewHelper129->setRenderChildrenClosure($renderChildrenClosure128);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output122 .= $viewHelper129->initializeArgumentsAndRender();

$output122 .= '
                            </div>
                            <div class="tab-pane fade in" id="settings">
                                settings
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		';
return $output122;
};
$arguments82['__elseClosure'] = function() use ($renderingContext, $self) {
$output130 = '';

$output130 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments131 = array();
$arguments131['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments131['as'] = 'emulator';
$arguments131['key'] = '';
$arguments131['reverse'] = false;
$arguments131['iteration'] = NULL;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
$output133 = '';

$output133 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments134 = array();
$arguments134['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments134['keepQuotes'] = false;
$arguments134['encoding'] = 'UTF-8';
$arguments134['doubleEncode'] = true;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$value136 = ($arguments134['value'] !== NULL ? $arguments134['value'] : $renderChildrenClosure135());

$output133 .= (!is_string($value136) ? $value136 : htmlspecialchars($value136, ($arguments134['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments134['encoding'], $arguments134['doubleEncode']));

$output133 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments137 = array();
$arguments137['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments137['keepQuotes'] = false;
$arguments137['encoding'] = 'UTF-8';
$arguments137['doubleEncode'] = true;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return NULL;
};
$value139 = ($arguments137['value'] !== NULL ? $arguments137['value'] : $renderChildrenClosure138());

$output133 .= (!is_string($value139) ? $value139 : htmlspecialchars($value139, ($arguments137['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments137['encoding'], $arguments137['doubleEncode']));

$output133 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments140 = array();
$arguments140['action'] = 'loadEmulator';
$arguments140['additionalAttributes'] = NULL;
$arguments140['data'] = NULL;
$arguments140['arguments'] = array (
);
$arguments140['controller'] = NULL;
$arguments140['package'] = NULL;
$arguments140['subpackage'] = NULL;
$arguments140['object'] = NULL;
$arguments140['section'] = '';
$arguments140['format'] = '';
$arguments140['additionalParams'] = array (
);
$arguments140['absolute'] = false;
$arguments140['addQueryString'] = false;
$arguments140['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments140['fieldNamePrefix'] = NULL;
$arguments140['actionUri'] = NULL;
$arguments140['objectName'] = NULL;
$arguments140['useParentRequest'] = false;
$arguments140['enctype'] = NULL;
$arguments140['method'] = NULL;
$arguments140['name'] = NULL;
$arguments140['onreset'] = NULL;
$arguments140['onsubmit'] = NULL;
$arguments140['class'] = NULL;
$arguments140['dir'] = NULL;
$arguments140['id'] = NULL;
$arguments140['lang'] = NULL;
$arguments140['style'] = NULL;
$arguments140['title'] = NULL;
$arguments140['accesskey'] = NULL;
$arguments140['tabindex'] = NULL;
$arguments140['onclick'] = NULL;
$renderChildrenClosure141 = function() use ($renderingContext, $self) {
$output142 = '';

$output142 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments143 = array();
$arguments143['name'] = 'Emulator';
$arguments143['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments143['additionalAttributes'] = NULL;
$arguments143['data'] = NULL;
$arguments143['property'] = NULL;
$arguments143['class'] = NULL;
$arguments143['dir'] = NULL;
$arguments143['id'] = NULL;
$arguments143['lang'] = NULL;
$arguments143['style'] = NULL;
$arguments143['title'] = NULL;
$arguments143['accesskey'] = NULL;
$arguments143['tabindex'] = NULL;
$arguments143['onclick'] = NULL;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper145 = $self->getViewHelper('$viewHelper145', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper145->setArguments($arguments143);
$viewHelper145->setRenderingContext($renderingContext);
$viewHelper145->setRenderChildrenClosure($renderChildrenClosure144);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output142 .= $viewHelper145->initializeArgumentsAndRender();

$output142 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments146 = array();
$arguments146['class'] = 'btn btn-link';
$arguments146['value'] = 'Select';
$arguments146['additionalAttributes'] = NULL;
$arguments146['data'] = NULL;
$arguments146['name'] = NULL;
$arguments146['property'] = NULL;
$arguments146['disabled'] = NULL;
$arguments146['dir'] = NULL;
$arguments146['id'] = NULL;
$arguments146['lang'] = NULL;
$arguments146['style'] = NULL;
$arguments146['title'] = NULL;
$arguments146['accesskey'] = NULL;
$arguments146['tabindex'] = NULL;
$arguments146['onclick'] = NULL;
$renderChildrenClosure147 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper148 = $self->getViewHelper('$viewHelper148', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper148->setArguments($arguments146);
$viewHelper148->setRenderingContext($renderingContext);
$viewHelper148->setRenderChildrenClosure($renderChildrenClosure147);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output142 .= $viewHelper148->initializeArgumentsAndRender();

$output142 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments149 = array();
$arguments149['action'] = 'emulator';
$arguments149['class'] = 'text-primary';
$arguments149['additionalAttributes'] = NULL;
$arguments149['data'] = NULL;
$arguments149['arguments'] = array (
);
$arguments149['controller'] = NULL;
$arguments149['package'] = NULL;
$arguments149['subpackage'] = NULL;
$arguments149['section'] = '';
$arguments149['format'] = '';
$arguments149['additionalParams'] = array (
);
$arguments149['addQueryString'] = false;
$arguments149['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments149['useParentRequest'] = false;
$arguments149['absolute'] = true;
$arguments149['dir'] = NULL;
$arguments149['id'] = NULL;
$arguments149['lang'] = NULL;
$arguments149['style'] = NULL;
$arguments149['title'] = NULL;
$arguments149['accesskey'] = NULL;
$arguments149['tabindex'] = NULL;
$arguments149['onclick'] = NULL;
$arguments149['name'] = NULL;
$arguments149['rel'] = NULL;
$arguments149['rev'] = NULL;
$arguments149['target'] = NULL;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper151 = $self->getViewHelper('$viewHelper151', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper151->setArguments($arguments149);
$viewHelper151->setRenderingContext($renderingContext);
$viewHelper151->setRenderChildrenClosure($renderChildrenClosure150);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output142 .= $viewHelper151->initializeArgumentsAndRender();

$output142 .= '
                				';
return $output142;
};
$viewHelper152 = $self->getViewHelper('$viewHelper152', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper152->setArguments($arguments140);
$viewHelper152->setRenderingContext($renderingContext);
$viewHelper152->setRenderChildrenClosure($renderChildrenClosure141);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output133 .= $viewHelper152->initializeArgumentsAndRender();

$output133 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output133;
};

$output130 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments131, $renderChildrenClosure132, $renderingContext);

$output130 .= '
    		</div>
		';
return $output130;
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper153->setArguments($arguments82);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output81 .= $viewHelper153->initializeArgumentsAndRender();

$output81 .= '
';
return $output81;
};

$output73 .= '';

return $output73;
}


}
#0             54929     