import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { Calendar, Clock, User, Phone, Mail, MessageSquare, CheckCircle } from 'lucide-react';

const Booking = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    service: '',
    date: '',
    time: '',
    message: ''
  });
  const [isSubmitted, setIsSubmitted] = useState(false);

  const services = [
    'Limpeza de Pele Profunda',
    'Peeling Químico',
    'Hidratação Facial Premium',
    'Drenagem Linfática',
    'Modelagem Corporal',
    'Microagulhamento',
    'Radiofrequência',
    'Massagem Relaxante',
    'Aromaterapia',
    'Consulta Personalizada'
  ];

  const timeSlots = [
    '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
    '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'
  ];

  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Simulate form submission
    setIsSubmitted(true);
    
    // Reset form after 3 seconds
    setTimeout(() => {
      setIsSubmitted(false);
      setFormData({
        name: '',
        email: '',
        phone: '',
        service: '',
        date: '',
        time: '',
        message: ''
      });
    }, 3000);
  };

  const getTomorrowDate = () => {
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    return tomorrow.toISOString().split('T')[0];
  };

  if (isSubmitted) {
    return (
      <section id="booking" className="py-20 bg-gradient-to-b from-white to-cream-50">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            initial={{ opacity: 0, scale: 0.8 }}
            animate={{ opacity: 1, scale: 1 }}
            className="max-w-md mx-auto text-center bg-white rounded-2xl p-8 shadow-lg border border-cream-200"
          >
            <motion.div
              initial={{ scale: 0 }}
              animate={{ scale: 1 }}
              transition={{ delay: 0.2, type: "spring", stiffness: 200 }}
              className="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-6"
            >
              <CheckCircle className="text-white" size={40} />
            </motion.div>
            
            <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-4">
              Agendamento Realizado!
            </h3>
            <p className="text-sage-600 mb-6">
              Recebemos sua solicitação de agendamento. Nossa equipe entrará em contato em breve para confirmar sua consulta.
            </p>
            <div className="bg-cream-50 rounded-lg p-4">
              <p className="text-sm text-sage-600">
                <strong>Próximos passos:</strong><br />
                • Confirmação por WhatsApp ou telefone<br />
                • Envio de informações preparatórias<br />
                • Lembrete 24h antes da consulta
              </p>
            </div>
          </motion.div>
        </div>
      </section>
    );
  }

  return (
    <section id="booking" className="py-20 bg-gradient-to-b from-white to-cream-50">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Agendamento</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            Agende sua
            <span className="block text-gold-600">Consulta</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            Preencha o formulário abaixo e nossa equipe entrará em contato para confirmar 
            seu agendamento e esclarecer qualquer dúvida.
          </p>
        </motion.div>

        <div className="grid lg:grid-cols-2 gap-16 items-start">
          {/* Booking Form */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
            className="bg-white rounded-2xl p-8 shadow-lg border border-cream-200"
          >
            <form onSubmit={handleSubmit} className="space-y-6">
              {/* Personal Information */}
              <div className="grid md:grid-cols-2 gap-6">
                <div>
                  <label className="block text-sm font-medium text-sage-700 mb-2">
                    <User size={16} className="inline mr-2" />
                    Nome Completo *
                  </label>
                  <input
                    type="text"
                    name="name"
                    value={formData.name}
                    onChange={handleInputChange}
                    required
                    className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                    placeholder="Seu nome completo"
                  />
                </div>
                <div>
                  <label className="block text-sm font-medium text-sage-700 mb-2">
                    <Phone size={16} className="inline mr-2" />
                    Telefone *
                  </label>
                  <input
                    type="tel"
                    name="phone"
                    value={formData.phone}
                    onChange={handleInputChange}
                    required
                    className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                    placeholder="(11) 99999-9999"
                  />
                </div>
              </div>

              <div>
                <label className="block text-sm font-medium text-sage-700 mb-2">
                  <Mail size={16} className="inline mr-2" />
                  E-mail *
                </label>
                <input
                  type="email"
                  name="email"
                  value={formData.email}
                  onChange={handleInputChange}
                  required
                  className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                  placeholder="seu@email.com"
                />
              </div>

              {/* Service Selection */}
              <div>
                <label className="block text-sm font-medium text-sage-700 mb-2">
                  Serviço Desejado *
                </label>
                <select
                  name="service"
                  value={formData.service}
                  onChange={handleInputChange}
                  required
                  className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                >
                  <option value="">Selecione um serviço</option>
                  {services.map((service, index) => (
                    <option key={index} value={service}>{service}</option>
                  ))}
                </select>
              </div>

              {/* Date and Time */}
              <div className="grid md:grid-cols-2 gap-6">
                <div>
                  <label className="block text-sm font-medium text-sage-700 mb-2">
                    <Calendar size={16} className="inline mr-2" />
                    Data Preferida *
                  </label>
                  <input
                    type="date"
                    name="date"
                    value={formData.date}
                    onChange={handleInputChange}
                    min={getTomorrowDate()}
                    required
                    className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                  />
                </div>
                <div>
                  <label className="block text-sm font-medium text-sage-700 mb-2">
                    <Clock size={16} className="inline mr-2" />
                    Horário Preferido *
                  </label>
                  <select
                    name="time"
                    value={formData.time}
                    onChange={handleInputChange}
                    required
                    className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200"
                  >
                    <option value="">Selecione um horário</option>
                    {timeSlots.map((time, index) => (
                      <option key={index} value={time}>{time}</option>
                    ))}
                  </select>
                </div>
              </div>

              {/* Message */}
              <div>
                <label className="block text-sm font-medium text-sage-700 mb-2">
                  <MessageSquare size={16} className="inline mr-2" />
                  Observações
                </label>
                <textarea
                  name="message"
                  value={formData.message}
                  onChange={handleInputChange}
                  rows={4}
                  className="w-full px-4 py-3 border border-cream-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-colors duration-200 resize-none"
                  placeholder="Conte-nos sobre suas expectativas, histórico de tratamentos ou qualquer informação relevante..."
                />
              </div>

              {/* Submit Button */}
              <motion.button
                type="submit"
                className="w-full bg-gold-500 hover:bg-gold-600 text-white py-4 rounded-lg font-semibold text-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
                whileHover={{ scale: 1.02 }}
                whileTap={{ scale: 0.98 }}
              >
                Solicitar Agendamento
              </motion.button>

              <p className="text-xs text-sage-500 text-center">
                * Campos obrigatórios. Ao enviar este formulário, você concorda com nossa política de privacidade.
              </p>
            </form>
          </motion.div>

          {/* Information Panel */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
            className="space-y-8"
          >
            {/* Contact Info */}
            <div className="bg-gradient-to-br from-sage-50 to-cream-50 rounded-2xl p-8">
              <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-6">
                Informações de Contato
              </h3>
              <div className="space-y-4">
                <div className="flex items-center space-x-3">
                  <Phone className="text-gold-500" size={20} />
                  <div>
                    <p className="font-medium text-sage-800">(11) 9999-9999</p>
                    <p className="text-sm text-sage-600">WhatsApp disponível</p>
                  </div>
                </div>
                <div className="flex items-center space-x-3">
                  <Mail className="text-gold-500" size={20} />
                  <div>
                    <p className="font-medium text-sage-800">contato@serenityclinic.com.br</p>
                    <p className="text-sm text-sage-600">Resposta em até 24h</p>
                  </div>
                </div>
                <div className="flex items-center space-x-3">
                  <Clock className="text-gold-500" size={20} />
                  <div>
                    <p className="font-medium text-sage-800">Seg - Sex: 9h às 18h</p>
                    <p className="text-sm text-sage-600">Sáb: 9h às 15h</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Process Info */}
            <div className="bg-white rounded-2xl p-8 shadow-lg border border-cream-200">
              <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-6">
                Como Funciona
              </h3>
              <div className="space-y-4">
                <div className="flex items-start space-x-3">
                  <div className="w-8 h-8 bg-gold-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">1</div>
                  <div>
                    <h4 className="font-medium text-sage-800">Preencha o Formulário</h4>
                    <p className="text-sm text-sage-600">Informe seus dados e preferências</p>
                  </div>
                </div>
                <div className="flex items-start space-x-3">
                  <div className="w-8 h-8 bg-gold-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                  <div>
                    <h4 className="font-medium text-sage-800">Confirmação</h4>
                    <p className="text-sm text-sage-600">Nossa equipe entrará em contato</p>
                  </div>
                </div>
                <div className="flex items-start space-x-3">
                  <div className="w-8 h-8 bg-gold-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                  <div>
                    <h4 className="font-medium text-sage-800">Sua Consulta</h4>
                    <p className="text-sm text-sage-600">Desfrute da experiência Serenity</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Special Offer */}
            <div className="bg-gradient-to-br from-gold-50 to-gold-100 rounded-2xl p-8 border border-gold-200">
              <h3 className="font-serif text-xl font-semibold text-sage-800 mb-4">
                Oferta Especial
              </h3>
              <p className="text-sage-600 mb-4">
                <strong>20% de desconto</strong> na primeira consulta para novos clientes. 
                Válido até o final do mês!
              </p>
              <p className="text-xs text-sage-500">
                *Desconto aplicável apenas em tratamentos selecionados. Consulte condições.
              </p>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};

export default Booking;