<?php namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ContactTypeModel;
use App\Models\DestinationModel;
use App\Models\ReservationModel;
use Exception;

class ReservationController extends BaseController
{
    public $reservation_model;
    public $contact_type_model;
    public $destination_model;
    /**
     * @var \App\Models\ContactModel
     */
    private $contact_model;

    /**
     * ReservationController constructor.
     */
    public function __construct()
    {
        $this->reservation_model = new ReservationModel();
        $this->contact_type_model = new ContactTypeModel();
        $this->contact_model = new ContactModel();
        $this->destination_model = new DestinationModel();
    }

    public function index()
    {
        helper(['form', 'url']);

        return view('reservation_list');
    }

    public function sortByDataTable()
    {
        $limit = $this->request->getPost('length');
        $start = $this->request->getPost('start');
        $sort_by = $this->request->getPost('sort_by');

        $sort_options = $this->getSortOptions($sort_by);
        $reservation_count = $this->reservation_model->getReservationCount();
        $reservations = $this->reservation_model->getReservations($sort_options['col'], $sort_options['dir'], $start, $limit);
        $result = array();

        if (!empty($reservations)) {
            foreach ($reservations as $reservation) {
                $nestedData['id_reservation'] = $reservation->getIdReservation();
                $nestedData['image_url'] = '<img class="td-internal-image" src="' . base_url() . '/' . $reservation->getDestination()->getImageUrl() . '" height="50" width="50"/' . '>';
                $nestedData['name'] = '<b>' . $reservation->getDestination()->getName() . '</b><br>' . date('j M Y h:i a', strtotime($reservation->getDate()->format('Y-m-d')));
                $nestedData['rating'] = '<b>' . 'Raiting' . '</b><br>' . $this->starRating($reservation->getDestination()->getRating());
                $nestedData['addfavorites'] = 'Add Favorites';
                $nestedData['favorite'] = $reservation->getDestination()->getFavorite();
                $edit_function = 'editItem(' . $reservation->getIdReservation() . ')';
                $html = '<div class="table-secondary"><button type="button" onclick="' . $edit_function . '" class="btn rounded-0">EDIT</button></div>';
                $nestedData['actions'] = $html;
                $result[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->request->getPost('draw')),
            "recordsTotal" => intval($reservation_count),
            "recordsFiltered" => intval($reservation_count),
            "data" => $result
        );
        echo json_encode($json_data);
    }

    public function starRating($rating)
    {

        $whole_stars = floor($rating);
        $half_star = round($rating * 2) % 2;
        $empty_stars = 5 - $rating;
        $HTML = "";
        for ($i = 0; $i < $whole_stars; $i++) {
            $HTML .= '<span><img class="td-internal-image" src="' . base_url() . '/img/full-star.jpg' . '" height="13" width="13" alt=""/' . '></span>';
        }
        if ($half_star) {
            $HTML .= '<span><img class="td-internal-image" src="' . base_url() . '/img/half-star.jpg' . '" height="13" width="13" alt=""/' . '></span>';
            for ($i = 0; $i < $empty_stars - 1; $i++) {
                $HTML .= '<span><img class="td-internal-image" src="' . base_url() . '/img/empty-star.jpg' . '" height="13" width="13" alt=""/' . '></span>';
            }
        } else {
            for ($i = 0; $i < $empty_stars; $i++) {
                $HTML .= '<span><img class="td-internal-image" src="' . base_url() . '/img/empty-star.jpg' . '" height="13" width="13" alt=""/' . '></span>';
            }
        }

        return $HTML;
    }

    public function create()
    {
        $data['title'] = "Create dreservation";
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $data['destinations'] = $this->destination_model->getAllDestinations();

        return view('reservation_create', $data);
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
            'reservation_date' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_date.required',
                ]
            ],
            'reservation_time' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_time.required',
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run() == false) {
            session()->setFlashdata('message', $this->validator);

            return redirect()->route('contact/create')->withInput()->with('validation', $this->validator);
        } else {
            $contact_data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];

            try {
                $id_contact = $this->contact_model->addContact($contact_data);
                if (empty($id_contact))
                    throw new Exception(lang('contact_process_fail'));
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
            $reservation_data = [
                "contact" => $id_contact,
                "destination" => $postData['destination'],
                "reservation_date" =>$postData['reservation_date'],
                "reservation_time" =>$postData['reservation_time'],
                "description" => $postData['text_editor']
            ];

            try {
                $this->reservation_model->addReservation($reservation_data);
                session()->setFlashdata('message', lang('Validation.success_create'));
            } catch (Exception $e) {
                session()->setFlashdata('message', throwException($e->getMessage()));
            }
            return redirect()->to(base_url('/'));
        }
    }

    public function edit($id)
    {
        helper(['form', 'url']);
        $data['title'] = "Edit Reservation";
        $data['reservations'] = $this->reservation_model->getReservationById($id);
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $data['destinations'] = $this->destination_model->getAllDestinations();
        $birthday_date = $data['reservations']->getContact()->getBirthDate();
        $data['birthday'] = $birthday_date->format('d/m/Y');
        $reservation_time = $data['reservations']->getTime();
        $reservation_date = $data['reservations']->getDate();
        $data['reservation_date'] = $reservation_date->format('d/m/Y');
        $data['reservation_time'] = $reservation_time->format('H:i:s');
        return view('reservation_edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $postData = $this->request->getPost();
        $validation = \Config\Services::validation();
//        $session = \Config\Services::session();

        $validation->setRules([
            'reservation_date' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_date.required',
                ]
            ],
            'reservation_time' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_time.required',
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run() == false) {
            session()->setFlashdata('message', $this->validator);

            return redirect()->route('contact/create')->withInput()->with('validation', $this->validator);
        } else {
            $reservation_data = [
                "destination" => $postData['destination'],
                "reservation_date" =>$postData['reservation_date'],
                "reservation_time" =>$postData['reservation_time'],
                "description" => $postData['text_editor']
            ];

            try {
                $this->reservation_model->updateReservation($reservation_data, $id);
                session()->setFlashdata('message', lang('Validation.success_updatee'));
            } catch (Exception $e) {
                session()->setFlashdata('message', throwException($e->getMessage()));
            }
            return redirect()->to(base_url('/'));
        }
    }

}