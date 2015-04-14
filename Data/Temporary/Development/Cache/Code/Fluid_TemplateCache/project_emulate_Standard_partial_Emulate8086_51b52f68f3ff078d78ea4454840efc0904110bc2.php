<?php
class FluidCache_project_emulate_Standard_partial_Emulate8086_51b52f68f3ff078d78ea4454840efc0904110bc2 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<div class="row">
	<div class="col-md-12 pull-right">
		<div class="form-group">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 pull-right">
    						    <h4 class="panel-title">Display (press esc to exit to main menu)</h4>
                            </div>
                            <div class="col-md-6 pull-right">
                                <button type="button" class="btn btn-outline btn-warning">Save</button>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      	<div class="panel-body" id="display">
                       		E: Ex_Mon<br>
							G: Go To<br>
							S: Sub_MIR
                       	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 pull-right">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-12">
	    				<form id="inputcode" action="#">
	    					<label>Write Your Code here (Refer help section for more info on how to use this):</label>
	    					<div id="error" class="text-danger"></div>
  							<input type="text" class="form-control" id="command" value="" autocomplete="off">
						</form>
	    			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments1 = array();
$arguments1['path'] = 'emulate8086/js/myscript.js';
$arguments1['package'] = NULL;
$arguments1['resource'] = NULL;
$arguments1['localize'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>-->
<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments4 = array();
$arguments4['path'] = 'emulate8086/js/script.js';
$arguments4['package'] = NULL;
$arguments4['resource'] = NULL;
$arguments4['localize'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper

$output0 .= $viewHelper6->initializeArgumentsAndRender();

$output0 .= '" type="text/javascript"></script>';

return $output0;
}


}
#0             3764      