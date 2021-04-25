<?php namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ContactTypeModel;
use App\Models\ReservationModel;
use Exception;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\throwException;

class ContactController extends BaseController
{
    public $contact_model;
    public $contact_type_model;
    public $reservation_model;

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->contact_model = new ContactModel();
        $this->contact_type_model = new ContactTypeModel();
        $this->reservation_model = new ReservationModel();
    }

    function index()
    {
        helper(['form', 'url']);
        $data['validation'] = \Config\Services::validation();
        return view('contact_list', $data);
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
                $html = '<div class="table-secondary"><button type="button" onclick="' . $edit_function . '" id="editbtn" class="btn rounded-0">EDIT</button></div>' .
                    '<div class="table-secondary"><button type="button" name = "' . $contact->getIdContact() . '" id="deletebtn" class="btn rounded-0">DELETE</button></div>';
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
        session();
        $data['title'] = "Create Contact";
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $data['validation'] = \Config\Services::validation();

        return view('contact_create', $data);
    }

    public function store()
    {
        $postData = $this->request->getPost();
        $validation = [
            'contact_name' => [
                'label' => 'Validation.contact_name',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Validation.contact_name.required'
                ]
            ],
            'contact_type' => [
                'label' => 'Validation.contact_type',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Validation.contact_type.required',
                    'numeric' => 'Validation.contact_phone.required'
                ]
            ],
            'contact_phone' => [
                'label' => 'Validation.contact_phone',
                'rules' => 'required|regex_match[^\d{2}[\s\.-]?\d{4}[\s\.-]?\d{4}$]',
                'errors' => [
                    'required' => 'Validation.contact_phone.required',
                    'regex_match' => 'Validation.contact_phone.phone_valid_format'
                ]
            ],
            'contact_birthday' => [
                'label' => 'Validation.contact_birthday',
                'rules' => 'required|valid_date[d/m/Y]|valid_birthday_date',
                'errors' => [
                    'required' => 'Validation.contact_birthday.required',
                    'valid_birthday_date' => 'Validation.contact_birthday.valid_birthday_date'
                ]
            ],
        ];


        if ($this->validate($validation)) {
            $contact_data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];
            try {
                $id_contact = $this->contact_model->addContact($contact_data);
                if (empty($id_contact))
                    throw new Exception(lang('Validation.contact_process_fail'));
                else
                    session()->setFlashdata('success', lang('Validation.success_create', ['object'=>lang('App.contact')]));
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
            return redirect()->to(base_url('/contacts'));
        }
        return redirect()->route('contact/create')->withInput();
    }

    public function edit($id)
    {
        helper(['form', 'url']);
        $data['title'] = "Edit Contact";
        $data['contact'] = $this->contact_model->findContactById($id);
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $birthday_date = $data['contact']->getBirthDate();
        $data['birthday'] = $birthday_date->format('d/m/Y');

        return view('contact_edit', $data);
    }

    public function update($id)
    {
        $postData = $this->request->getPost();

        $validation = [
            'contact_name' => [
                'label' => 'Validation.contact_name',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Validation.contact_name.required'
                ]
            ],
            'contact_type' => [
                'label' => 'Validation.contact_type',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Validation.contact_type.required',
                    'numeric' => 'Validation.contact_phone.required'
                ]
            ],
            'contact_phone' => [
                'label' => 'Validation.contact_phone',
                'rules' => 'required|regex_match[^\d{2}[\s\.-]?\d{4}[\s\.-]?\d{4}$]',
                'errors' => [
                    'required' => 'Validation.contact_phone.required',
                    'regex_match' => 'Validation.contact_phone.phone_valid_format'
                ]
            ],
            'contact_birthday' => [
                'label' => 'Validation.contact_birthday',
                'rules' => 'required|valid_date[d/m/Y]|valid_birthday_date',
                'errors' => [
                    'required' => 'Validation.contact_birthday.required',
                    'valid_birthday_date' => 'Validation.contact_birthday.valid_birthday_date'
                ]
            ],
        ];

        if ($this->validate($validation)) {
            $contact_data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];
            try {
                $this->contact_model->updateContact($contact_data, $id);
                if (empty($id_contact))
                    throw new Exception(lang('Validation.contact_process_fail'));
                else
                    session()->setFlashdata('success', lang('Validation.success_update', ['object'=>lang('App.contact')]));
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
            return redirect()->to(base_url('/contacts'));
        }
        return redirect()->route('contact/create')->withInput();
    }

    public function delete($id)
    {
        $contact = $this->contact_model->findContactById($id);

        if ($contact == null)
            session()->setFlashdata('error', 'Contact not found');
        else {
            $reservations = $this->reservation_model->findByContact($contact->getIdContact());

            if ($reservations > 0) {
                session()->setFlashdata('error', lang('Validation.contact_non_delete', ['object_name' => $contact->getName()]));
            } else {
                try {
                    $this->contact_model->deleteContact($id);
                    session()->setFlashdata('success', lang('Validation.success_delete', ['object' => lang('App.contact'), 'object_name' => $contact->getName()]));
                } catch (Exception $e) {
                    session()->setFlashdata('error', $e->getMessage());
                }
            }
        }

    }
}