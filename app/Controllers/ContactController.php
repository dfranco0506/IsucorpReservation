<?php namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ContactTypeModel;
use PHPUnit\Exception;
use function PHPUnit\Framework\throwException;

class ContactController extends BaseController
{
    public $contact_model;
    public $contact_type_model;

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->contact_model = new ContactModel();
        $this->contact_type_model = new ContactTypeModel();
    }

    function index()
    {
        return view('contact_list');
    }

    function getLists()
    {
        helper(['form', 'url']);
        $columns = array(
            0 => 'name',
            1 => 'phone_number',
            2 => 'birth_date',
            3 => 'contact_type'
        );

        $sort_col = $columns[$this->request->getPost('order')[0]['column']];
        $sort_dir = $this->request->getPost('order')[0]['dir'];
        $limit = $this->request->getPost('length');
        $start = $this->request->getPost('start');

        $contact_count = $this->contact_model->getContactCount();
        $contacts = $this->contact_model->getContacts($sort_col, $sort_dir, $start, $limit);
        $result = array();

        if (!empty($contacts)) {
            foreach ($contacts as $contact) {
                $nestedData['id'] = $contact->getIdContact();
                $nestedData['name'] = $contact->getName();
                $nestedData['birth_date'] = date('j M Y', strtotime($contact->getBirthDate()->format('Y-m-d')));
                $nestedData['phone_number'] = $contact->getPhoneNumber();
                $nestedData['contact_type'] = $contact->getContactType()->getName();
                $edit_function = 'editItem(' . $contact->getIdContact() . ')';
                $del_function = 'deleteItem(' . $contact->getIdContact() . ')';
                $html = '<div class="table-secondary"><button type="button" onclick="' . $edit_function . '" class="btn rounded-0">EDIT</button></div>' .
                    '<div class="table-secondary"><button type="button" onclick="' . $del_function . '" class="btn rounded-0">DELETE</button></div>';
                $nestedData['actions'] = $html;
                $result[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->request->getPost('draw')),
            "recordsTotal" => intval($contact_count),
            "recordsFiltered" => intval($contact_count),
            "data" => $result
        );

        echo json_encode($json_data);
    }

    public function create()
    {
        $data['title'] = "Create Contact";
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();

        return view('contact_create', $data);
    }

    public function store()
    {
        helper(['form', 'url']);
        $postData = $this->request->getPost();
        $validation = \Config\Services::validation();
//        $session = \Config\Services::session();

        $validation->setRules([
            'contact_name' => [
                'label' => 'Validation.contact_name',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Validation.contact_name.required'
                ]
            ],
            'contact_type' => [
                'label' => 'Validation.contact_type',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.contact_type.required'
                ]
            ],
            'contact_phone' => [
                'label' => 'Validation.contact_phone',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Validation.contact_phone.required',
                ]
            ],
            'contact_birthday' => [
                'label' => 'Validation.contact_birthday',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.contact_birthday.required',
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run() == false) {
            session()->setFlashdata('message', $this->validator);

            return redirect()->route('contact/create')->withInput()->with('validation', $this->validator);

//            echo view('contact_create', [
//                'validation' => $this->validator,
//            ]);
        } else {
            $data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];
            try {
                $this->contact_model->addContact($data);
                session()->setFlashdata('message', lang('Validation.success_create'));
            } catch (Exception $e) {
                session()->setFlashdata('message', throwException($e->getMessage()));
            }
//                    echo '<pre>';print_r(session()->getFlashdata('message'));die;
            return redirect()->to(base_url('/contacts'));
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Contact";
        $data['contacts'] = $this->contact_model->findContactById($id);
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $birthday_date = $data['contacts']->getBirthDate();
        $data['birthday'] = $birthday_date->format('d/m/Y');

        return view('contact_edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $postData = $this->request->getPost();
        $validation = \Config\Services::validation();
//        $session = \Config\Services::session();

        $validation->setRules([
            'contact_name' => [
                'label' => 'Validation.contact_name',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Validation.contact_name.required'
                ]
            ],
            'contact_type' => [
                'label' => 'Validation.contact_type',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.contact_type.required'
                ]
            ],
            'contact_phone' => [
                'label' => 'Validation.contact_phone',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Validation.contact_phone.required',
                ]
            ],
            'contact_birthday' => [
                'label' => 'Validation.contact_birthday',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.contact_birthday.required',
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run() == false) {
            session()->setFlashdata('message', $this->validator);

            return redirect()->route('contact/create')->withInput()->with('validation', $this->validator);
        } else {
            $data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];
            try {
                $this->contact_model->updateContact($data, $id);
                session()->setFlashdata('message', lang('Validation.success_update'));
            } catch (Exception $e) {
                session()->setFlashdata('message', throwException($e->getMessage()));
            }

            return redirect()->to(base_url('/contacts'));
        }
    }

    public function delete($id)
    {
        try {
            $this->contact_model->deleteContact($id);
            session()->setFlashdata('message', lang('Validation.success_delete'));
        } catch (Exception $e) {
            session()->setFlashdata('message', throwException($e->getMessage()));
        }
        return redirect()->to(base_url('/contacts'));
    }
}