<?php
class FluidCache_project_emulate_Standard_action_emulator_eb865a920b8c0140b3156c50d7509b64964de315 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments7 = array();
$arguments7['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array8 = array();
$array8['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments7['arguments'] = $array8;
$arguments7['section'] = NULL;
$arguments7['optional'] = false;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper10->setArguments($arguments7);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output6 .= $viewHelper10->initializeArgumentsAndRender();

$output6 .= '
		';
return $output6;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper11->setArguments($arguments4);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output3 .= $viewHelper11->initializeArgumentsAndRender();

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments12 = array();
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
$output14 = '';

$output14 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments15 = array();
$arguments15['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments15['as'] = 'emulator';
$arguments15['key'] = '';
$arguments15['reverse'] = false;
$arguments15['iteration'] = NULL;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
$output17 = '';

$output17 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments18 = array();
$arguments18['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments18['keepQuotes'] = false;
$arguments18['encoding'] = 'UTF-8';
$arguments18['doubleEncode'] = true;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$value20 = ($arguments18['value'] !== NULL ? $arguments18['value'] : $renderChildrenClosure19());

$output17 .= (!is_string($value20) ? $value20 : htmlspecialchars($value20, ($arguments18['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments18['encoding'], $arguments18['doubleEncode']));

$output17 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments21 = array();
$arguments21['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments21['keepQuotes'] = false;
$arguments21['encoding'] = 'UTF-8';
$arguments21['doubleEncode'] = true;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$value23 = ($arguments21['value'] !== NULL ? $arguments21['value'] : $renderChildrenClosure22());

$output17 .= (!is_string($value23) ? $value23 : htmlspecialchars($value23, ($arguments21['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments21['encoding'], $arguments21['doubleEncode']));

$output17 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments24 = array();
$arguments24['action'] = 'loadEmulator';
$arguments24['additionalAttributes'] = NULL;
$arguments24['data'] = NULL;
$arguments24['arguments'] = array (
);
$arguments24['controller'] = NULL;
$arguments24['package'] = NULL;
$arguments24['subpackage'] = NULL;
$arguments24['object'] = NULL;
$arguments24['section'] = '';
$arguments24['format'] = '';
$arguments24['additionalParams'] = array (
);
$arguments24['absolute'] = false;
$arguments24['addQueryString'] = false;
$arguments24['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments24['fieldNamePrefix'] = NULL;
$arguments24['actionUri'] = NULL;
$arguments24['objectName'] = NULL;
$arguments24['useParentRequest'] = false;
$arguments24['enctype'] = NULL;
$arguments24['method'] = NULL;
$arguments24['name'] = NULL;
$arguments24['onreset'] = NULL;
$arguments24['onsubmit'] = NULL;
$arguments24['class'] = NULL;
$arguments24['dir'] = NULL;
$arguments24['id'] = NULL;
$arguments24['lang'] = NULL;
$arguments24['style'] = NULL;
$arguments24['title'] = NULL;
$arguments24['accesskey'] = NULL;
$arguments24['tabindex'] = NULL;
$arguments24['onclick'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$output26 = '';

$output26 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments27 = array();
$arguments27['name'] = 'Emulator';
$arguments27['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments27['additionalAttributes'] = NULL;
$arguments27['data'] = NULL;
$arguments27['property'] = NULL;
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
return NULL;
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output26 .= $viewHelper29->initializeArgumentsAndRender();

$output26 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments30 = array();
$arguments30['class'] = 'btn btn-link';
$arguments30['value'] = 'Select';
$arguments30['additionalAttributes'] = NULL;
$arguments30['data'] = NULL;
$arguments30['name'] = NULL;
$arguments30['property'] = NULL;
$arguments30['disabled'] = NULL;
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
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output26 .= $viewHelper32->initializeArgumentsAndRender();

$output26 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments33 = array();
$arguments33['action'] = 'emulator';
$arguments33['class'] = 'text-primary';
$arguments33['additionalAttributes'] = NULL;
$arguments33['data'] = NULL;
$arguments33['arguments'] = array (
);
$arguments33['controller'] = NULL;
$arguments33['package'] = NULL;
$arguments33['subpackage'] = NULL;
$arguments33['section'] = '';
$arguments33['format'] = '';
$arguments33['additionalParams'] = array (
);
$arguments33['addQueryString'] = false;
$arguments33['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments33['useParentRequest'] = false;
$arguments33['absolute'] = true;
$arguments33['dir'] = NULL;
$arguments33['id'] = NULL;
$arguments33['lang'] = NULL;
$arguments33['style'] = NULL;
$arguments33['title'] = NULL;
$arguments33['accesskey'] = NULL;
$arguments33['tabindex'] = NULL;
$arguments33['onclick'] = NULL;
$arguments33['name'] = NULL;
$arguments33['rel'] = NULL;
$arguments33['rev'] = NULL;
$arguments33['target'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper35->setArguments($arguments33);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure34);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output26 .= $viewHelper35->initializeArgumentsAndRender();

$output26 .= '
                				';
return $output26;
};
$viewHelper36 = $self->getViewHelper('$viewHelper36', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper36->setArguments($arguments24);
$viewHelper36->setRenderingContext($renderingContext);
$viewHelper36->setRenderChildrenClosure($renderChildrenClosure25);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output17 .= $viewHelper36->initializeArgumentsAndRender();

$output17 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output17;
};

$output14 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);

$output14 .= '
    		</div>
		';
return $output14;
};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper37->setArguments($arguments12);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure13);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output3 .= $viewHelper37->initializeArgumentsAndRender();

$output3 .= '
	';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$output38 = '';

$output38 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments39 = array();
$arguments39['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array40 = array();
$array40['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments39['arguments'] = $array40;
$arguments39['section'] = NULL;
$arguments39['optional'] = false;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper42->setArguments($arguments39);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output38 .= $viewHelper42->initializeArgumentsAndRender();

$output38 .= '
		';
return $output38;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$output43 = '';

$output43 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments44 = array();
$arguments44['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments44['as'] = 'emulator';
$arguments44['key'] = '';
$arguments44['reverse'] = false;
$arguments44['iteration'] = NULL;
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
$output46 = '';

$output46 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments47 = array();
$arguments47['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments47['keepQuotes'] = false;
$arguments47['encoding'] = 'UTF-8';
$arguments47['doubleEncode'] = true;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};
$value49 = ($arguments47['value'] !== NULL ? $arguments47['value'] : $renderChildrenClosure48());

$output46 .= (!is_string($value49) ? $value49 : htmlspecialchars($value49, ($arguments47['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments47['encoding'], $arguments47['doubleEncode']));

$output46 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments50 = array();
$arguments50['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments50['keepQuotes'] = false;
$arguments50['encoding'] = 'UTF-8';
$arguments50['doubleEncode'] = true;
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return NULL;
};
$value52 = ($arguments50['value'] !== NULL ? $arguments50['value'] : $renderChildrenClosure51());

$output46 .= (!is_string($value52) ? $value52 : htmlspecialchars($value52, ($arguments50['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments50['encoding'], $arguments50['doubleEncode']));

$output46 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments53 = array();
$arguments53['action'] = 'loadEmulator';
$arguments53['additionalAttributes'] = NULL;
$arguments53['data'] = NULL;
$arguments53['arguments'] = array (
);
$arguments53['controller'] = NULL;
$arguments53['package'] = NULL;
$arguments53['subpackage'] = NULL;
$arguments53['object'] = NULL;
$arguments53['section'] = '';
$arguments53['format'] = '';
$arguments53['additionalParams'] = array (
);
$arguments53['absolute'] = false;
$arguments53['addQueryString'] = false;
$arguments53['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments53['fieldNamePrefix'] = NULL;
$arguments53['actionUri'] = NULL;
$arguments53['objectName'] = NULL;
$arguments53['useParentRequest'] = false;
$arguments53['enctype'] = NULL;
$arguments53['method'] = NULL;
$arguments53['name'] = NULL;
$arguments53['onreset'] = NULL;
$arguments53['onsubmit'] = NULL;
$arguments53['class'] = NULL;
$arguments53['dir'] = NULL;
$arguments53['id'] = NULL;
$arguments53['lang'] = NULL;
$arguments53['style'] = NULL;
$arguments53['title'] = NULL;
$arguments53['accesskey'] = NULL;
$arguments53['tabindex'] = NULL;
$arguments53['onclick'] = NULL;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
$output55 = '';

$output55 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments56 = array();
$arguments56['name'] = 'Emulator';
$arguments56['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments56['additionalAttributes'] = NULL;
$arguments56['data'] = NULL;
$arguments56['property'] = NULL;
$arguments56['class'] = NULL;
$arguments56['dir'] = NULL;
$arguments56['id'] = NULL;
$arguments56['lang'] = NULL;
$arguments56['style'] = NULL;
$arguments56['title'] = NULL;
$arguments56['accesskey'] = NULL;
$arguments56['tabindex'] = NULL;
$arguments56['onclick'] = NULL;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper58->setArguments($arguments56);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output55 .= $viewHelper58->initializeArgumentsAndRender();

$output55 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments59 = array();
$arguments59['class'] = 'btn btn-link';
$arguments59['value'] = 'Select';
$arguments59['additionalAttributes'] = NULL;
$arguments59['data'] = NULL;
$arguments59['name'] = NULL;
$arguments59['property'] = NULL;
$arguments59['disabled'] = NULL;
$arguments59['dir'] = NULL;
$arguments59['id'] = NULL;
$arguments59['lang'] = NULL;
$arguments59['style'] = NULL;
$arguments59['title'] = NULL;
$arguments59['accesskey'] = NULL;
$arguments59['tabindex'] = NULL;
$arguments59['onclick'] = NULL;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper61 = $self->getViewHelper('$viewHelper61', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper61->setArguments($arguments59);
$viewHelper61->setRenderingContext($renderingContext);
$viewHelper61->setRenderChildrenClosure($renderChildrenClosure60);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output55 .= $viewHelper61->initializeArgumentsAndRender();

$output55 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments62 = array();
$arguments62['action'] = 'emulator';
$arguments62['class'] = 'text-primary';
$arguments62['additionalAttributes'] = NULL;
$arguments62['data'] = NULL;
$arguments62['arguments'] = array (
);
$arguments62['controller'] = NULL;
$arguments62['package'] = NULL;
$arguments62['subpackage'] = NULL;
$arguments62['section'] = '';
$arguments62['format'] = '';
$arguments62['additionalParams'] = array (
);
$arguments62['addQueryString'] = false;
$arguments62['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments62['useParentRequest'] = false;
$arguments62['absolute'] = true;
$arguments62['dir'] = NULL;
$arguments62['id'] = NULL;
$arguments62['lang'] = NULL;
$arguments62['style'] = NULL;
$arguments62['title'] = NULL;
$arguments62['accesskey'] = NULL;
$arguments62['tabindex'] = NULL;
$arguments62['onclick'] = NULL;
$arguments62['name'] = NULL;
$arguments62['rel'] = NULL;
$arguments62['rev'] = NULL;
$arguments62['target'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper64->setArguments($arguments62);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output55 .= $viewHelper64->initializeArgumentsAndRender();

$output55 .= '
                				';
return $output55;
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper65->setArguments($arguments53);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output46 .= $viewHelper65->initializeArgumentsAndRender();

$output46 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output46;
};

$output43 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments44, $renderChildrenClosure45, $renderingContext);

$output43 .= '
    		</div>
		';
return $output43;
};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper66->setArguments($arguments1);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper66->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output67 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments68 = array();
$arguments68['name'] = 'Page';
$renderChildrenClosure69 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper70 = $self->getViewHelper('$viewHelper70', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper70->setArguments($arguments68);
$viewHelper70->setRenderingContext($renderingContext);
$viewHelper70->setRenderChildrenClosure($renderChildrenClosure69);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output67 .= $viewHelper70->initializeArgumentsAndRender();

$output67 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments71 = array();
$arguments71['name'] = 'notifications';
$renderChildrenClosure72 = function() use ($renderingContext, $self) {
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

$output67 .= '';

$output67 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments73 = array();
$arguments73['name'] = 'Content';
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
$output75 = '';

$output75 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments76 = array();
// Rendering Boolean node
$arguments76['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'readyState', $renderingContext), 1);
$arguments76['then'] = NULL;
$arguments76['else'] = NULL;
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
$output78 = '';

$output78 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments79 = array();
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments82 = array();
$arguments82['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array83 = array();
$array83['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments82['arguments'] = $array83;
$arguments82['section'] = NULL;
$arguments82['optional'] = false;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper85 = $self->getViewHelper('$viewHelper85', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper85->setArguments($arguments82);
$viewHelper85->setRenderingContext($renderingContext);
$viewHelper85->setRenderChildrenClosure($renderChildrenClosure84);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output81 .= $viewHelper85->initializeArgumentsAndRender();

$output81 .= '
		';
return $output81;
};
$viewHelper86 = $self->getViewHelper('$viewHelper86', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper86->setArguments($arguments79);
$viewHelper86->setRenderingContext($renderingContext);
$viewHelper86->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output78 .= $viewHelper86->initializeArgumentsAndRender();

$output78 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments87 = array();
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
$output89 = '';

$output89 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments90 = array();
$arguments90['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments90['as'] = 'emulator';
$arguments90['key'] = '';
$arguments90['reverse'] = false;
$arguments90['iteration'] = NULL;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
$output92 = '';

$output92 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = 'UTF-8';
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());

$output92 .= (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments93['encoding'], $arguments93['doubleEncode']));

$output92 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments96 = array();
$arguments96['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments96['keepQuotes'] = false;
$arguments96['encoding'] = 'UTF-8';
$arguments96['doubleEncode'] = true;
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};
$value98 = ($arguments96['value'] !== NULL ? $arguments96['value'] : $renderChildrenClosure97());

$output92 .= (!is_string($value98) ? $value98 : htmlspecialchars($value98, ($arguments96['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments96['encoding'], $arguments96['doubleEncode']));

$output92 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments99 = array();
$arguments99['action'] = 'loadEmulator';
$arguments99['additionalAttributes'] = NULL;
$arguments99['data'] = NULL;
$arguments99['arguments'] = array (
);
$arguments99['controller'] = NULL;
$arguments99['package'] = NULL;
$arguments99['subpackage'] = NULL;
$arguments99['object'] = NULL;
$arguments99['section'] = '';
$arguments99['format'] = '';
$arguments99['additionalParams'] = array (
);
$arguments99['absolute'] = false;
$arguments99['addQueryString'] = false;
$arguments99['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments99['fieldNamePrefix'] = NULL;
$arguments99['actionUri'] = NULL;
$arguments99['objectName'] = NULL;
$arguments99['useParentRequest'] = false;
$arguments99['enctype'] = NULL;
$arguments99['method'] = NULL;
$arguments99['name'] = NULL;
$arguments99['onreset'] = NULL;
$arguments99['onsubmit'] = NULL;
$arguments99['class'] = NULL;
$arguments99['dir'] = NULL;
$arguments99['id'] = NULL;
$arguments99['lang'] = NULL;
$arguments99['style'] = NULL;
$arguments99['title'] = NULL;
$arguments99['accesskey'] = NULL;
$arguments99['tabindex'] = NULL;
$arguments99['onclick'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
$output101 = '';

$output101 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments102 = array();
$arguments102['name'] = 'Emulator';
$arguments102['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments102['additionalAttributes'] = NULL;
$arguments102['data'] = NULL;
$arguments102['property'] = NULL;
$arguments102['class'] = NULL;
$arguments102['dir'] = NULL;
$arguments102['id'] = NULL;
$arguments102['lang'] = NULL;
$arguments102['style'] = NULL;
$arguments102['title'] = NULL;
$arguments102['accesskey'] = NULL;
$arguments102['tabindex'] = NULL;
$arguments102['onclick'] = NULL;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper104->setArguments($arguments102);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure103);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output101 .= $viewHelper104->initializeArgumentsAndRender();

$output101 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments105 = array();
$arguments105['class'] = 'btn btn-link';
$arguments105['value'] = 'Select';
$arguments105['additionalAttributes'] = NULL;
$arguments105['data'] = NULL;
$arguments105['name'] = NULL;
$arguments105['property'] = NULL;
$arguments105['disabled'] = NULL;
$arguments105['dir'] = NULL;
$arguments105['id'] = NULL;
$arguments105['lang'] = NULL;
$arguments105['style'] = NULL;
$arguments105['title'] = NULL;
$arguments105['accesskey'] = NULL;
$arguments105['tabindex'] = NULL;
$arguments105['onclick'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper107 = $self->getViewHelper('$viewHelper107', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper107->setArguments($arguments105);
$viewHelper107->setRenderingContext($renderingContext);
$viewHelper107->setRenderChildrenClosure($renderChildrenClosure106);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output101 .= $viewHelper107->initializeArgumentsAndRender();

$output101 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments108 = array();
$arguments108['action'] = 'emulator';
$arguments108['class'] = 'text-primary';
$arguments108['additionalAttributes'] = NULL;
$arguments108['data'] = NULL;
$arguments108['arguments'] = array (
);
$arguments108['controller'] = NULL;
$arguments108['package'] = NULL;
$arguments108['subpackage'] = NULL;
$arguments108['section'] = '';
$arguments108['format'] = '';
$arguments108['additionalParams'] = array (
);
$arguments108['addQueryString'] = false;
$arguments108['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments108['useParentRequest'] = false;
$arguments108['absolute'] = true;
$arguments108['dir'] = NULL;
$arguments108['id'] = NULL;
$arguments108['lang'] = NULL;
$arguments108['style'] = NULL;
$arguments108['title'] = NULL;
$arguments108['accesskey'] = NULL;
$arguments108['tabindex'] = NULL;
$arguments108['onclick'] = NULL;
$arguments108['name'] = NULL;
$arguments108['rel'] = NULL;
$arguments108['rev'] = NULL;
$arguments108['target'] = NULL;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper110->setArguments($arguments108);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure109);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output101 .= $viewHelper110->initializeArgumentsAndRender();

$output101 .= '
                				';
return $output101;
};
$viewHelper111 = $self->getViewHelper('$viewHelper111', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper111->setArguments($arguments99);
$viewHelper111->setRenderingContext($renderingContext);
$viewHelper111->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output92 .= $viewHelper111->initializeArgumentsAndRender();

$output92 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output92;
};

$output89 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments90, $renderChildrenClosure91, $renderingContext);

$output89 .= '
    		</div>
		';
return $output89;
};
$viewHelper112 = $self->getViewHelper('$viewHelper112', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper112->setArguments($arguments87);
$viewHelper112->setRenderingContext($renderingContext);
$viewHelper112->setRenderChildrenClosure($renderChildrenClosure88);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output78 .= $viewHelper112->initializeArgumentsAndRender();

$output78 .= '
	';
return $output78;
};
$arguments76['__thenClosure'] = function() use ($renderingContext, $self) {
$output113 = '';

$output113 .= '
			';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments114 = array();
$arguments114['partial'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'partial', $renderingContext);
// Rendering Array
$array115 = array();
$array115['emulator'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator', $renderingContext);
$arguments114['arguments'] = $array115;
$arguments114['section'] = NULL;
$arguments114['optional'] = false;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper117 = $self->getViewHelper('$viewHelper117', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper117->setArguments($arguments114);
$viewHelper117->setRenderingContext($renderingContext);
$viewHelper117->setRenderChildrenClosure($renderChildrenClosure116);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output113 .= $viewHelper117->initializeArgumentsAndRender();

$output113 .= '
		';
return $output113;
};
$arguments76['__elseClosure'] = function() use ($renderingContext, $self) {
$output118 = '';

$output118 .= '
			<div class="row">
                <div class="col-lg-12">
                	<h3 class="page-header">List of Emulators</h3>
            	</div>
            	<!-- /.col-lg-12 -->
            </div>
			<div class="row">
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments119 = array();
$arguments119['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulators', $renderingContext);
$arguments119['as'] = 'emulator';
$arguments119['key'] = '';
$arguments119['reverse'] = false;
$arguments119['iteration'] = NULL;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
$output121 = '';

$output121 .= '
            		<div class="col-lg-4">
	                	<div class="panel panel-primary">
                    		<div class="panel-heading">
	                        	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments122 = array();
$arguments122['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.name', $renderingContext);
$arguments122['keepQuotes'] = false;
$arguments122['encoding'] = 'UTF-8';
$arguments122['doubleEncode'] = true;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};
$value124 = ($arguments122['value'] !== NULL ? $arguments122['value'] : $renderChildrenClosure123());

$output121 .= (!is_string($value124) ? $value124 : htmlspecialchars($value124, ($arguments122['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments122['encoding'], $arguments122['doubleEncode']));

$output121 .= '
							</div>
                    		<div class="panel-body">
	                    		<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments125 = array();
$arguments125['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.description', $renderingContext);
$arguments125['keepQuotes'] = false;
$arguments125['encoding'] = 'UTF-8';
$arguments125['doubleEncode'] = true;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};
$value127 = ($arguments125['value'] !== NULL ? $arguments125['value'] : $renderChildrenClosure126());

$output121 .= (!is_string($value127) ? $value127 : htmlspecialchars($value127, ($arguments125['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments125['encoding'], $arguments125['doubleEncode']));

$output121 .= '</p>
                    		</div>
                			<div class="panel-footer">
                				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments128 = array();
$arguments128['action'] = 'loadEmulator';
$arguments128['additionalAttributes'] = NULL;
$arguments128['data'] = NULL;
$arguments128['arguments'] = array (
);
$arguments128['controller'] = NULL;
$arguments128['package'] = NULL;
$arguments128['subpackage'] = NULL;
$arguments128['object'] = NULL;
$arguments128['section'] = '';
$arguments128['format'] = '';
$arguments128['additionalParams'] = array (
);
$arguments128['absolute'] = false;
$arguments128['addQueryString'] = false;
$arguments128['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments128['fieldNamePrefix'] = NULL;
$arguments128['actionUri'] = NULL;
$arguments128['objectName'] = NULL;
$arguments128['useParentRequest'] = false;
$arguments128['enctype'] = NULL;
$arguments128['method'] = NULL;
$arguments128['name'] = NULL;
$arguments128['onreset'] = NULL;
$arguments128['onsubmit'] = NULL;
$arguments128['class'] = NULL;
$arguments128['dir'] = NULL;
$arguments128['id'] = NULL;
$arguments128['lang'] = NULL;
$arguments128['style'] = NULL;
$arguments128['title'] = NULL;
$arguments128['accesskey'] = NULL;
$arguments128['tabindex'] = NULL;
$arguments128['onclick'] = NULL;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
$output130 = '';

$output130 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments131 = array();
$arguments131['name'] = 'Emulator';
$arguments131['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'emulator.key', $renderingContext);
$arguments131['additionalAttributes'] = NULL;
$arguments131['data'] = NULL;
$arguments131['property'] = NULL;
$arguments131['class'] = NULL;
$arguments131['dir'] = NULL;
$arguments131['id'] = NULL;
$arguments131['lang'] = NULL;
$arguments131['style'] = NULL;
$arguments131['title'] = NULL;
$arguments131['accesskey'] = NULL;
$arguments131['tabindex'] = NULL;
$arguments131['onclick'] = NULL;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper133 = $self->getViewHelper('$viewHelper133', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper133->setArguments($arguments131);
$viewHelper133->setRenderingContext($renderingContext);
$viewHelper133->setRenderChildrenClosure($renderChildrenClosure132);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output130 .= $viewHelper133->initializeArgumentsAndRender();

$output130 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments134 = array();
$arguments134['class'] = 'btn btn-link';
$arguments134['value'] = 'Select';
$arguments134['additionalAttributes'] = NULL;
$arguments134['data'] = NULL;
$arguments134['name'] = NULL;
$arguments134['property'] = NULL;
$arguments134['disabled'] = NULL;
$arguments134['dir'] = NULL;
$arguments134['id'] = NULL;
$arguments134['lang'] = NULL;
$arguments134['style'] = NULL;
$arguments134['title'] = NULL;
$arguments134['accesskey'] = NULL;
$arguments134['tabindex'] = NULL;
$arguments134['onclick'] = NULL;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper136 = $self->getViewHelper('$viewHelper136', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper136->setArguments($arguments134);
$viewHelper136->setRenderingContext($renderingContext);
$viewHelper136->setRenderChildrenClosure($renderChildrenClosure135);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output130 .= $viewHelper136->initializeArgumentsAndRender();

$output130 .= '
                					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments137 = array();
$arguments137['action'] = 'emulator';
$arguments137['class'] = 'text-primary';
$arguments137['additionalAttributes'] = NULL;
$arguments137['data'] = NULL;
$arguments137['arguments'] = array (
);
$arguments137['controller'] = NULL;
$arguments137['package'] = NULL;
$arguments137['subpackage'] = NULL;
$arguments137['section'] = '';
$arguments137['format'] = '';
$arguments137['additionalParams'] = array (
);
$arguments137['addQueryString'] = false;
$arguments137['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments137['useParentRequest'] = false;
$arguments137['absolute'] = true;
$arguments137['dir'] = NULL;
$arguments137['id'] = NULL;
$arguments137['lang'] = NULL;
$arguments137['style'] = NULL;
$arguments137['title'] = NULL;
$arguments137['accesskey'] = NULL;
$arguments137['tabindex'] = NULL;
$arguments137['onclick'] = NULL;
$arguments137['name'] = NULL;
$arguments137['rel'] = NULL;
$arguments137['rev'] = NULL;
$arguments137['target'] = NULL;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return 'Help';
};
$viewHelper139 = $self->getViewHelper('$viewHelper139', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper139->setArguments($arguments137);
$viewHelper139->setRenderingContext($renderingContext);
$viewHelper139->setRenderChildrenClosure($renderChildrenClosure138);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output130 .= $viewHelper139->initializeArgumentsAndRender();

$output130 .= '
                				';
return $output130;
};
$viewHelper140 = $self->getViewHelper('$viewHelper140', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper140->setArguments($arguments128);
$viewHelper140->setRenderingContext($renderingContext);
$viewHelper140->setRenderChildrenClosure($renderChildrenClosure129);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output121 .= $viewHelper140->initializeArgumentsAndRender();

$output121 .= '
                			</div>
            			</div>
        			</div>
        		';
return $output121;
};

$output118 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments119, $renderChildrenClosure120, $renderingContext);

$output118 .= '
    		</div>
		';
return $output118;
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper141->setArguments($arguments76);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure77);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output75 .= $viewHelper141->initializeArgumentsAndRender();

$output75 .= '
';
return $output75;
};

$output67 .= '';

return $output67;
}


}
#0             46897     