<?php
class FluidCache_project_emulate_Standard_action_home_f1133477de94c5c92780bfc7e79ef4af7a53a2ae extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

return '
				<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Timeline</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-clock-o fa-fw"></i> Timeline
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                            	<ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">History</a>
                                    </li>
                                    <li><a href="#share" data-toggle="tab">Shared</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                	<div class="tab-pane fade in active" id="home">
                                		<ul class="timeline">
		                                    <li>
                                        		<div class="timeline-badge success"><i class="fa fa-check"></i></div>
    	                                    	<div class="timeline-panel">
		                                            <div class="timeline-heading">
    	                                            	<h4 class="timeline-title">Code executed</h4>
        	                                        	<p>
	                                                    	<small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                		</p>
	                                            	</div>
                                            		<div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                            		</div>
                                        		</div>
                                    		</li>
                                            <li class="timeline-inverted">
                                                <div class="timeline-badge info"><i class="fa fa-save"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code saved</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
	                                    </ul>
	                                </div>
                                    <div class="tab-pane fade in" id="share">
                                		<ul class="timeline">
                                            <li>
                                                <div class="timeline-badge success"><i class="fa fa-check"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code executed</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-inverted">
                                                <div class="timeline-badge info"><i class="fa fa-save"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code saved</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
                                    		<li>
                                        		<div class="timeline-badge info"><i class="fa fa-save"></i></div>
	                                        	<div class="timeline-panel">
    	                                        	<div class="timeline-heading">
        	                                        	<h4 class="timeline-title">Timeline Event</h4>
            	                                	</div>
                	                            	<div class="timeline-body">
                    	                            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                        	                        	<hr />
                            	                    	<div class="btn-group">
                                	                    	<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        	                	<i class="fa fa-cog"></i>
                                            	            	<span class="caret"></span>
                                    	                	</button>
                                                	    	<ul class="dropdown-menu" role="menu">
                                                    	    	<li><a href="#">Action</a></li>
                                                        		<li><a href="#">Another action</a></li>
                                                        		<li><a href="#">Something else here</a></li>
	                                                        	<li class="divider"></li>
    	                                                    	<li><a href="#">Separated link</a></li>
        	                                            	</ul>
            	                                    	</div>
                	                            	</div>
                    	                    	</div>
                        	            	</li>
                        	            </ul>
                        	        </div>
                                </div>
                                <!-- Tab panes -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
';
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments1 = array();
$arguments1['name'] = 'Page';
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments4 = array();
$arguments4['name'] = 'notifications';
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
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

$output0 .= '';

$output0 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments6 = array();
$arguments6['name'] = 'Content';
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return '
				<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Timeline</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-clock-o fa-fw"></i> Timeline
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                            	<ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">History</a>
                                    </li>
                                    <li><a href="#share" data-toggle="tab">Shared</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                	<div class="tab-pane fade in active" id="home">
                                		<ul class="timeline">
		                                    <li>
                                        		<div class="timeline-badge success"><i class="fa fa-check"></i></div>
    	                                    	<div class="timeline-panel">
		                                            <div class="timeline-heading">
    	                                            	<h4 class="timeline-title">Code executed</h4>
        	                                        	<p>
	                                                    	<small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                		</p>
	                                            	</div>
                                            		<div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                            		</div>
                                        		</div>
                                    		</li>
                                            <li class="timeline-inverted">
                                                <div class="timeline-badge info"><i class="fa fa-save"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code saved</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
	                                    </ul>
	                                </div>
                                    <div class="tab-pane fade in" id="share">
                                		<ul class="timeline">
                                            <li>
                                                <div class="timeline-badge success"><i class="fa fa-check"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code executed</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-inverted">
                                                <div class="timeline-badge info"><i class="fa fa-save"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Code saved</h4>
                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-time"></i> 11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="col-md-6">1000:0205</div> <div class="col-md-6">MOV AX,BX</div>
                                                        <div class="col-md-6">1000:0207</div> <div class="col-md-6">INC AX</div>
                                                    </div>
                                                </div>
                                            </li>
                                    		<li>
                                        		<div class="timeline-badge info"><i class="fa fa-save"></i></div>
	                                        	<div class="timeline-panel">
    	                                        	<div class="timeline-heading">
        	                                        	<h4 class="timeline-title">Timeline Event</h4>
            	                                	</div>
                	                            	<div class="timeline-body">
                    	                            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                        	                        	<hr />
                            	                    	<div class="btn-group">
                                	                    	<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        	                	<i class="fa fa-cog"></i>
                                            	            	<span class="caret"></span>
                                    	                	</button>
                                                	    	<ul class="dropdown-menu" role="menu">
                                                    	    	<li><a href="#">Action</a></li>
                                                        		<li><a href="#">Another action</a></li>
                                                        		<li><a href="#">Something else here</a></li>
	                                                        	<li class="divider"></li>
    	                                                    	<li><a href="#">Separated link</a></li>
        	                                            	</ul>
            	                                    	</div>
                	                            	</div>
                    	                    	</div>
                        	            	</li>
                        	            </ul>
                        	        </div>
                                </div>
                                <!-- Tab panes -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
';
};

$output0 .= '';

return $output0;
}


}
#0             19965     