<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staff Model
 *
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, callable $callback = null)
 */
class StaffTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('staff');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->integer('staff_no')
            ->requirePresence('staff_no', 'create')
            ->notEmpty('staff_no')
            ->add('staff_no', 'exist', [ 'rule' => [$this, 'exist'], 'message' => 'It is registered' ])
            ->add('staff_no', [ 'between' => ['rule' => ['lengthBetween', 7, 7], 'message' => 'Enter in 7 digits'] ]);

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', [
                'maxLength' => ['rule' => ['maxLength', 200], 'message' => 'Up to 200 characters'],
            ]);

        $validator
            ->integer('department')
            ->requirePresence('department', 'create')
            ->notEmpty('department');

        $validator
            ->integer('gender')
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        // Insert時に自動で保存される
        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        // Insert時に自動で保存、Update時に自動で更新される
        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->dateTime('deleted_at')
            ->allowEmpty('deleted_at');

        return $validator;
    }

    public function exist($value, $context) {
        $table = $context['providers']['table'];
        $query = $table->find();
        $query->where([$context['field'] => $value]);

        //自身のIDを除外
        if(!empty($context['data'][$table->_primaryKey])) {
            $query->where([$table->_primaryKey.' !=' => $context['data'][$table->_primaryKey]]);
        }

        $count = $query->count();
        return (bool) $count == 0;
    }
}
