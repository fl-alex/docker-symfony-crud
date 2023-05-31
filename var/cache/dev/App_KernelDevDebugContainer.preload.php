<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).''.\DIRECTORY_SEPARATOR.'vendor/autoload.php';
(require __DIR__.'/App_KernelDevDebugContainer.php')->set(\ContainerRD6KWbE\App_KernelDevDebugContainer::class, null);
require __DIR__.'/ContainerRD6KWbE/EntityManagerGhostEbeb667.php';
require __DIR__.'/ContainerRD6KWbE/getSession_Handler_NativeService.php';
require __DIR__.'/ContainerRD6KWbE/getSession_FactoryService.php';
require __DIR__.'/ContainerRD6KWbE/getServicesResetterService.php';
require __DIR__.'/ContainerRD6KWbE/getSecrets_VaultService.php';
require __DIR__.'/ContainerRD6KWbE/getRouting_LoaderService.php';
require __DIR__.'/ContainerRD6KWbE/getErrorControllerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_UuidGeneratorService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_UlidGeneratorService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_Listeners_PdoSessionHandlerSchemaListenerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_Listeners_LockStoreSchemaListenerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_Listeners_DoctrineTokenProviderSchemaListenerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_Listeners_DoctrineDbalCacheAdapterSchemaListenerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Orm_DefaultEntityManagerService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrine_Dbal_DefaultConnectionService.php';
require __DIR__.'/ContainerRD6KWbE/getDoctrineService.php';
require __DIR__.'/ContainerRD6KWbE/getContainer_GetRoutingConditionServiceService.php';
require __DIR__.'/ContainerRD6KWbE/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/ContainerRD6KWbE/getContainer_EnvVarProcessorService.php';
require __DIR__.'/ContainerRD6KWbE/getCache_SystemClearerService.php';
require __DIR__.'/ContainerRD6KWbE/getCache_SystemService.php';
require __DIR__.'/ContainerRD6KWbE/getCache_GlobalClearerService.php';
require __DIR__.'/ContainerRD6KWbE/getCache_AppClearerService.php';
require __DIR__.'/ContainerRD6KWbE/getCache_AppService.php';
require __DIR__.'/ContainerRD6KWbE/getAnnotations_ReaderService.php';
require __DIR__.'/ContainerRD6KWbE/getAnnotations_CachedReaderService.php';
require __DIR__.'/ContainerRD6KWbE/getTemplateControllerService.php';
require __DIR__.'/ContainerRD6KWbE/getRedirectControllerService.php';
require __DIR__.'/ContainerRD6KWbE/getArticlesControllerService.php';
require __DIR__.'/ContainerRD6KWbE/get_ServiceLocator_Y4Zrx_Service.php';
require __DIR__.'/ContainerRD6KWbE/get_ServiceLocator_HBdvAhpService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_Doctrine_Orm_EntityValueResolverService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_VariadicService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_SessionService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_ServiceService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_RequestService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_DefaultService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_DatetimeService.php';
require __DIR__.'/ContainerRD6KWbE/get_Debug_ValueResolver_ArgumentResolver_BackedEnumResolverService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\BackedEnumValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DateTimeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Bridge\Doctrine\ArgumentResolver\EntityValueResolver';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\ArticlesController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'Symfony\Component\Cache\Adapter\PhpArrayAdapter';
$classes[] = 'Doctrine\Common\Annotations\PsrCachedReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\CacheAttributeListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Schema\LegacySchemaManagerFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\DebugMiddleware';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AttributeDriver';
$classes[] = 'Doctrine\ORM\Proxy\Autoloader';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver';
$classes[] = 'Doctrine\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Doctrine\ORM\Tools\AttachEntityListenersListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\DoctrineDbalCacheAdapterSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\RememberMeTokenProviderDoctrineSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\LockStoreSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\PdoSessionHandlerSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UlidGenerator';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\HttpKernelRunner';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\ResponseRunner';
$classes[] = 'Symfony\Component\Runtime\SymfonyRuntime';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Kernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\Psr4DirectoryLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\SessionFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorageFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

$preloaded = Preloader::preload($classes);
