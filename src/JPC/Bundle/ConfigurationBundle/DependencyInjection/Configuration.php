<?php

namespace JPC\Bundle\ConfigurationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jpc_configuration');

        $rootNode
            ->children()
                ->scalarNode('host')
                ->end()
                ->append($this->addConnectionsNode())
            ->end()
        ;

        return $treeBuilder;
    }

    private function addConnectionsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('connections');

        $node
            ->isRequired()
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->prototype('array')
                ->children()
                    ->scalarNode('ip')->isRequired()->end()
                ->end()
            ->end()
        ;

        return $node;
    }
}
