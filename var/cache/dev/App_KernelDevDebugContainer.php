<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRD6KWbE\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRD6KWbE/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerRD6KWbE.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerRD6KWbE\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerRD6KWbE\App_KernelDevDebugContainer([
    'container.build_hash' => 'RD6KWbE',
    'container.build_id' => '2eddf087',
    'container.build_time' => 1685515422,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRD6KWbE');
