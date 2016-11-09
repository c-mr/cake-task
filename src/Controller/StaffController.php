<?php
namespace App\Controller;

use App\Controller\AppController;

// マスタ定義ファイル呼出
use Cake\Core\Configure;


class StaffController extends AppController
{

    /**
     * 一覧画面
     */
    public function index()
    {
        // マスタ定義をViewに送る
        $this->set('department', Configure::read('department'));
        $this->set('gender', Configure::read('gender'));

        // IDでソートしてViewに送る
        $this->set('staffs', $this->Staff->find('all')->order(['id' => 'DESC']));
    }

    /**
     * 新規登録
     * @return Indexへ遷移
     */
    public function add()
    {
        // マスタ定義をViewに送る
        $this->set('department', Configure::read('department'));
        $this->set('gender', Configure::read('gender'));

        // Postで呼出されたらインサート処理
        if ($this->request->is('post')) {
            $staff = $this->Staff->newEntity();
            $staff = $this->Staff->patchEntity($staff, $this->request->data);
            // debug($staff->errors());

            if(!$staff->errors()) {
                if ($this->Staff->save($staff)) {
                    // セーブしたらIndexへ遷移
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                // 入力ミスがあればエラーメッセージ
                $this->set('errors', $staff->errors());
            }
        }
    }

    /**
     * 詳細表示
     * @param  int $id
     * @return Indexへ遷移
     */
    public function detail($id = null)
    {
        // マスタ定義をViewに送る
        $this->set('department', Configure::read('department'));
        $this->set('gender', Configure::read('gender'));

        // DBから値を取得
        $staff = $this->Staff->get($id);

        // ViewにDBから取得した値をとる
        $this->set('staff', $staff);
    }

    /**
     * 編集
     * @param  int $id
     * @return Indexへ遷移
     */
    public function edit($id = null)
    {
        // マスタ定義をViewに送る
        $this->set('department', Configure::read('department'));
        $this->set('gender', Configure::read('gender'));

        // DBから値を取得
        $staff = $this->Staff->get($id);

        // 社員番号は7桁で0埋めもしておく
        $staff['staff_no'] = h(sprintf('%07d', $staff->staff_no));
        // 編集画面ヘ(Viewへ値を送る)
        $this->set('staff', $staff);

        // Postで呼出されたらアップデート処理
        if ($this->request->is(['post', 'put'])) {
            $staff = $this->Staff->patchEntity($staff, $this->request->data);
            // debug($staff->errors());

            if(!$staff->errors()) {
                if ($this->Staff->save($staff)) {
                    // セーブしたらIndexへ遷移
                    return $this->redirect(['action' => 'detail/'.$id]);
                }
            } else {
                // 入力ミスがあればエラーメッセージ
                $this->set('errors', $staff->errors());
            }
        }


    }

    /**
     * 削除(物理)
     * @param  int $id
     * @return Indexへ遷移
     */
    public function delete($id = null)
    {
        // DBから値を取得
        $staff = $this->Staff->get($id);

        // Postから呼び出された時はDeleteしてIndexへ遷移
        if ($this->request->is(['post', 'put'])) {
            if ($this->Staff->delete($staff)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }
}