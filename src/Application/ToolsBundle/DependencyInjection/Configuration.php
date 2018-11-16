<?php

namespace Application\ToolsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('application_tools');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        
        $rootNode
            ->children()
                ->arrayNode('dependent_filtered_entities')
                    ->useAttributeAsKey('id')
                    ->prototype('array')
                        ->children()
                            ->arrayNode('form_options')
                                ->children()
                                    ->scalarNode('entity_alias')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('class')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('field_name')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('parent_field')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('parent_property')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('property')
                                        ->defaultValue(null)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('empty_value')
                                        ->defaultValue(null)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('no_result_msg')
                                        ->defaultValue('No results were found')
                                        ->cannotBeEmpty()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('search_options')
                                ->children()
                                    ->scalarNode('role')
                                        ->defaultValue('IS_AUTHENTICATED_ANONYMOUSLY')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('order_property')
                                        ->defaultValue('id')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('order_direction')
                                        ->defaultValue('ASC')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->booleanNode('property_complicated')
                                        ->defaultFalse()
                                    ->end()
                                    ->booleanNode('case_insensitive')
                                        ->defaultTrue()
                                    ->end()
                                    ->scalarNode('search')
                                        ->defaultValue('begins_with')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('callback')
                                        ->defaultValue(null)
                                        ->cannotBeEmpty()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
        ;

        return $treeBuilder;
    }
}
