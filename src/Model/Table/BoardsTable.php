<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Boards Model
 *
 * @method \App\Model\Entity\Board get($primaryKey, $options = [])
 * @method \App\Model\Entity\Board newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Board[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Board|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Board[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Board findOrCreate($search, callable $callback = null, $options = [])
 */
class BoardsTable extends Table
{

    public $sql = null;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('boards');
        $this->setDisplayField(['name', 'title']);
        $this->setPrimaryKey('id');

        $this->belongsTo('People');

        

        // $this->entityClass('book');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45, 'not validator!!')
            ->allowEmpty('name');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmpty('title');

        $validator
            ->scalar('content')
            ->allowEmpty('content');

        $validator
            ->add("name", 'maxRecords', [
                'rule' => ['maxRecords', 'name' , 2],
                'message' => __('max length is 2'),
                'provider' => 'table',
            ]);

        return $validator;
    }


    public static function defaultConnectionName()
    {
        return 'default';
    } 


    public function beforeFind(Event $event, Query $query) {
        $query->order(['id' => 'DESC']);
        $this->sql = $query->sql();
    }

    public function maxRecords($data, $field, $num)
    {
        $n = $this->find()
           ->where([$field => $data])
           ->count();
        return $n < $num ? true: false;
    }

}
